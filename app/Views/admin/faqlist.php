<div class="container">
    <h2>FAQ List</h2>
    <hr>
    <a class="btn btn-primary text-light" href="setup-faq">Add FAQ</a>

    <?php if (session()->has('success')): ?>
    <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
        <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
    </div>
    <?php elseif (session()->has('msg')): ?>
    <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
        <p class="m-0 p-1"><?= session('error') ?? '' ?></p>
    </div>
    <?php endif; ?>


    <div class="card p-3 my-3">

        <table class="table table-striped bodered-hover" id="myTable">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>FAQ title</th>
                    <th>Faq Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 0;
                if (!empty($faqList)): foreach ($faqList as $fl): $i++; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $fl['faq_title'] ?? '' ?></td>
                    <td><?= !empty($fl['faq_category']) && $fl['faq_category'] == 1 ? 'Billing' : 'Collection' ?></td>
                    <td>
                        <a class="fa fa-edit text-success" href="setup-faq?faq_id=<?= $fl['faq_id'] ?? '' ?>"></a>
                        <a class="fa fa-trash text-danger" href="delete-faq?faq_id=<?= $fl['faq_id'] ?? '' ?>"></a>
                    </td>
                </tr>

                <?php endforeach;
                endif ?>

            </tbody>
        </table>

    </div>


</div>