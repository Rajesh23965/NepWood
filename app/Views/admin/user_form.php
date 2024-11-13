<div class="row col card p-3">
    <div class="col p-3">
        <div class="container card p-3">
            <h5>User registration</h5>
            <?php if (session()->has('success')): ?>
            <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
                <p class="m-0 p-1"><?=session('success') ?? ''?></p>
            </div>

            <?php elseif (session()->has('errors')): ?>
            <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
                <ul>
                    <?php foreach (session('errors') as $error): ?>
                    <li><?=esc($error)?></li>
                    <?php endforeach?>
                </ul>
            </div>
            <?php endif;?>
            <hr>
            <?php if (isset($singleUser)) : extract($singleUser);
            endif ?>
            <form id="myForm" action="<?php echo base_url() . 'save-user/' ?><?php if (isset($id)) : echo $id;
                                                                                                endif ?>" method="POST"
                enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="first_name">First Name:</label>
                            <input type="text" class="form-control" name="first_name"
                                placeholder="Enter your first name"
                                value="<?php if (isset($first_name)) : echo $first_name;
                                                                                                                                    endif ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="middle_name">Middle Name:</label>
                            <input type="text" class="form-control" name="middle_name"
                                placeholder="Enter your middle name"
                                value="<?php if (isset($middle_name)) : echo $middle_name;
                                                                                                                                    endif ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="last_name">Last Name:</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Enter your last name"
                                value="<?php if (isset($last_name)) : echo $last_name;
                                                                                                                                endif ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter a username"
                                value="<?php if (isset($username)) : echo $username;
                                                                                                                            endif ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select class="form-control" name="gender">
                                <option value="1" <?php if (isset($gender) && ($gender == 1)) : echo 'selected';
                                                    endif ?>>Male</option>
                                <option value="2" <?php if (isset($gender) && ($gender == 2)) : echo 'selected';
                                                    endif ?>>Female</option>
                                <option value="3" <?php if (isset($gender) && ($gender == 3)) : echo 'selected';
                                                    endif ?>>Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select class="form-control" name="status">
                                <option value="1" <?php if (isset($status) && $status == 1) : echo 'selected';
                                                    endif ?>>Active</option>
                                <option value="2" <?php if (isset($status) && $status ==  2) : echo 'selected';
                                                    endif ?>>Inactive</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email"
                                value="<?php if (isset($email)) : echo $email;
                                                                                                                        endif ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Role:</label>
                            <select class="form-control" name="role">
                                <option value="1" <?php if (isset($role) && $role == 1) : echo 'selected';
                                                    endif ?>>Admin</option>
                                <option value="2" <?php if (isset($role) && $role ==  2) : echo 'selected';
                                                    endif ?>>Editor</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">userImage:</label>
                            <input class="form-control" type="file" name="userImage" accept='image/*'>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter a password" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                placeholder="Confirm your password" required>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4">
                        <div class="form-group mt-1">
                            <button class="btn btn-outline-success w-100" type="submit">Submit</button>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
    <div class="col card  mx-0">
        <table class="table mx-2">
            <thead>
                <tr>
                    <th>S.n</th>
                    <th>Full name</th>
                    <th>Gender</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($users)) : $i = 0;
                    foreach ($users as $user) : $i++
                ?>
                <tr>
                    <td><?php echo $i . '.';
                                ?></td>
                    <td><?php if (isset($user['first_name']) || isset($user['middle_name']) || isset($user['last_name'])) : echo $user['first_name'] . ' ' . $user['middle_name'] . ' ' . $user['last_name'];
                                endif
                                ?>

                    <td><?php if (isset($user['gender'])) : if (isset($user['gender']) && $user['gender'] == 1) : echo 'male';
                                    elseif (isset($user['gender']) && $user['gender'] == 2) : echo 'female';
                                    else : echo 'Others';
                                    endif;
                                endif;
                                ?></td>
                    <td><?php if (isset($user['role'])) : if ($user['role'] == 1) : echo "Admin";
                                    else : echo 'Editor';
                                    endif;
                                endif;
                                ?></td>
                    <td><?php if (isset($user['status'])) : echo $user['status'];
                                endif
                                ?></td>
                    <td><?php if (isset($user['username'])) : echo $user['username'];
                                endif
                                ?></td>
                    <td><?php if (isset($user['email'])) : echo $user['email'];
                                endif
                                ?></td>
                    <td>
                        <a class="mr-2" href="<?php echo base_url() . 'user/' ?><?php if (isset($user['id'])) : echo $user['id'];
                                                                                                    endif
                                                                                                    ?>"><i
                                class="fa fa-edit"></i></a>
                        <a class="text-danger"
                            href="<?php echo base_url() . 'delete-user/' ?><?php if (isset($user['id'])) : echo $user['id'];
                                                                                                                        endif
                                                                                                                        ?>"><i
                                class="fa fa-trash"></i></a>


                    </td>

                </tr>
                <?php endforeach;
                endif;
                ?>
            </tbody>
        </table>

    </div>
</div>







<!-- HTML form with password and confirm password fields -->