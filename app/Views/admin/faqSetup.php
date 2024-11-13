<?php if (!empty($faqById)): extract($faqById);
endif ?>
<div class="container">
    <h2>FAQ Setup</h2>
    <hr>
    <a class="btn btn-primary text-light" href="faq-list">FAQ List</a>

    <?php if (session()->has('success')): ?>
        <div class="float-end  notification alert z-1 alert-success col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('success') ?? '' ?></p>
        </div>
    <?php elseif (session()->has('msg')): ?>
        <div class="float-end alert notification alert z-1 alert-danger col-3 p-0 my-2 successMessage">
            <p class="m-0 p-1"><?= session('error') ?? '' ?></p>
        </div>
    <?php endif; ?>


    <div class="card py-3 my-3">
        <form action="save-faq-data<?= !empty($faq_id) ? '?faq_id=' . $faq_id : '' ?>" method="post">

            <div class="col-sm-12 col-md-12 col-lg-12 row mb-2 card-header border-0 px-2 mx-0">

                <div class="col-sm-12 col-md-4 col-lg-4">
                    <input class="form-control" type="text" name="faq_title" id="" placeholder="Enter FAQ Title"
                        required value="<?= $faq_title ?? '' ?>">
                </div>

                <div class="col-sm-12 col-md-4 col-lg-4">
                    <select class="form-select text-muted" name="faq_category" id="" required>
                        <option value="">--Select Category--</option>
                        <option value="1" <?= !empty($faq_category) && $faq_category == 1 ? 'selected' : '' ?>>Billing
                        </option>
                        <option value="2" <?= !empty($faq_category) && $faq_category == 2 ? 'selected' : '' ?>>
                            Collection</option>
                    </select>

                </div>

                <div class="col-sm-12 col-md-2 col-lg-2">
                    <input class="form-control" type="number" min="1" name="faq_order" id=""
                        placeholder="Enter FAQ Order" required value="<?= $faq_order ?? '' ?>">
                </div>

                <div class="col-sm-12 col-md-2 col-lg-2">
                    <input class="btn btn-outline-success" type="submit" value="Submit">
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 row px-3 mx-0">
                <textarea class="form-control mx-auto" name="faq_description"
                    id=""><?= $faq_description ?? '' ?></textarea>
            </div>
        </form>
    </div>


</div>