    <!-- Monday Meal Plan Modal Start-->
    <div class="modal fade" id="mondayMealPlanModal" tabindex="-1" aria-labelledby="mondayMealPlanModal" aria-hidden="false">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <div class="modal-header pb-0 border-0">
                    <h1 class="modal-title h4" id="mondayMealPlanModal">Monday Meal Plan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <hr class="mb-0">
                <div class="modal-body undefined">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Breakfast</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.monday_breakfast_calorie_count, custom_meal_plan.monday_breakfast FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.monday_breakfast = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $monday_breakfast = $row['monday_breakfast'];
                                                $monday_breakfast_calorie_count = $row['monday_breakfast_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $monday_breakfast_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Lunch</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.monday_lunch_calorie_count, custom_meal_plan.monday_lunch FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.monday_lunch = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $monday_lunch = $row['monday_lunch'];
                                                $monday_lunch_calorie_count = $row['monday_lunch_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $monday_lunch_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Snack</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.monday_snack_calorie_count, custom_meal_plan.monday_snack FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.monday_snack = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $monday_snack = $row['monday_snack'];
                                                $monday_snack_calorie_count = $row['monday_snack_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $monday_snack_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Dinner</label>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.monday_dinner_calorie_count, custom_meal_plan.monday_dinner FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.monday_dinner = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $monday_dinner = $row['monday_dinner'];
                                                $monday_dinner_calorie_count = $row['monday_dinner_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $monday_dinner_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Monday Meal Plan Modal End-->

    <!-- Tuesday Meal Plan Modal Start-->
    <div class="modal fade" id="tuesdayMealPlanModal" tabindex="-1" aria-labelledby="tuesdayMealPlanModal" aria-hidden="false">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <div class="modal-header pb-0 border-0">
                    <h1 class="modal-title h4" id="tuesdayMealPlanModal">Tuesday Meal Plan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <hr class="mb-0">
                <div class="modal-body undefined">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Breakfast</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.tuesday_breakfast_calorie_count, custom_meal_plan.tuesday_breakfast FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.tuesday_breakfast = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $tuesday_breakfast = $row['tuesday_breakfast'];
                                                $tuesday_breakfast_calorie_count = $row['tuesday_breakfast_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $tuesday_breakfast_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Lunch</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.tuesday_lunch_calorie_count, custom_meal_plan.tuesday_lunch FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.tuesday_lunch = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $tuesday_lunch = $row['tuesday_lunch'];
                                                $tuesday_lunch_calorie_count = $row['tuesday_lunch_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $tuesday_lunch_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Snack</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.tuesday_snack_calorie_count, custom_meal_plan.tuesday_snack FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.tuesday_snack = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $tuesday_snack = $row['tuesday_snack'];
                                                $tuesday_snack_calorie_count = $row['tuesday_snack_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $tuesday_snack_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Dinner</label>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.tuesday_dinner_calorie_count, custom_meal_plan.tuesday_dinner FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.tuesday_dinner = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $tuesday_dinner = $row['tuesday_dinner'];
                                                $tuesday_dinner_calorie_count = $row['tuesday_dinner_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $tuesday_dinner_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tuesday Meal Plan Modal End-->

    <!-- Wednesday Meal Plan Modal Start-->
    <div class="modal fade" id="wednesdayMealPlanModal" tabindex="-1" aria-labelledby="wednesdayMealPlanModal" aria-hidden="false">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <div class="modal-header pb-0 border-0">
                    <h1 class="modal-title h4" id="wednesdayMealPlanModal">Wednesday Meal Plan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <hr class="mb-0">
                <div class="modal-body undefined">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Breakfast</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.wednesday_breakfast_calorie_count, custom_meal_plan.wednesday_breakfast FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.wednesday_breakfast = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $wednesday_breakfast = $row['wednesday_breakfast'];
                                                $wednesday_breakfast_calorie_count = $row['wednesday_breakfast_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $wednesday_breakfast_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Lunch</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.wednesday_lunch_calorie_count, custom_meal_plan.wednesday_lunch FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.wednesday_lunch = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $wednesday_lunch = $row['wednesday_lunch'];
                                                $wednesday_lunch_calorie_count = $row['wednesday_lunch_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $wednesday_lunch_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Snack</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.wednesday_snack_calorie_count, custom_meal_plan.wednesday_snack FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.wednesday_snack = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $wednesday_snack = $row['wednesday_snack'];
                                                $wednesday_snack_calorie_count = $row['wednesday_snack_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $wednesday_snack_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Dinner</label>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.wednesday_dinner_calorie_count, custom_meal_plan.wednesday_dinner FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.wednesday_dinner = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $wednesday_dinner = $row['wednesday_dinner'];
                                                $wednesday_dinner_calorie_count = $row['wednesday_dinner_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $wednesday_dinner_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Wednesday Meal Plan Modal End-->

    <!-- Thursday Meal Plan Modal Start-->
    <div class="modal fade" id="thursdayMealPlanModal" tabindex="-1" aria-labelledby="thursdayMealPlanModal" aria-hidden="false">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <div class="modal-header pb-0 border-0">
                    <h1 class="modal-title h4" id="thursdayMealPlanModal">Thursday Meal Plan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <hr class="mb-0">
                <div class="modal-body undefined">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Breakfast</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.thursday_breakfast_calorie_count, custom_meal_plan.thursday_breakfast FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.thursday_breakfast = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $thursday_breakfast = $row['thursday_breakfast'];
                                                $thursday_breakfast_calorie_count = $row['thursday_breakfast_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $thursday_breakfast_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Lunch</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.thursday_lunch_calorie_count, custom_meal_plan.thursday_lunch FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.thursday_lunch = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $thursday_lunch = $row['thursday_lunch'];
                                                $thursday_lunch_calorie_count = $row['thursday_lunch_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $thursday_lunch_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Snack</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.thursday_snack_calorie_count, custom_meal_plan.thursday_snack FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.thursday_snack = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $thursday_snack = $row['thursday_snack'];
                                                $thursday_snack_calorie_count = $row['thursday_snack_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $thursday_snack_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Dinner</label>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.thursday_dinner_calorie_count, custom_meal_plan.thursday_dinner FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.thursday_dinner = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $thursday_dinner = $row['thursday_dinner'];
                                                $thursday_dinner_calorie_count = $row['thursday_dinner_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $thursday_dinner_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Thursday Meal Plan Modal End-->

    <!-- Friday Meal Plan Modal Start-->
    <div class="modal fade" id="fridayMealPlanModal" tabindex="-1" aria-labelledby="fridayMealPlanModal" aria-hidden="false">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <div class="modal-header pb-0 border-0">
                    <h1 class="modal-title h4" id="fridayMealPlanModal">Friday Meal Plan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <hr class="mb-0">
                <div class="modal-body undefined">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Breakfast</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.friday_breakfast_calorie_count, custom_meal_plan.friday_breakfast FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.friday_breakfast = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $friday_breakfast = $row['friday_breakfast'];
                                                $friday_breakfast_calorie_count = $row['friday_breakfast_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $friday_breakfast_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Lunch</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.friday_lunch_calorie_count, custom_meal_plan.friday_lunch FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.friday_lunch = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $friday_lunch = $row['friday_lunch'];
                                                $friday_lunch_calorie_count = $row['friday_lunch_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $friday_lunch_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Snack</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.friday_snack_calorie_count, custom_meal_plan.friday_snack FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.friday_snack = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $friday_snack = $row['friday_snack'];
                                                $friday_snack_calorie_count = $row['friday_snack_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $friday_snack_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Dinner</label>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.friday_dinner_calorie_count, custom_meal_plan.friday_dinner FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.friday_dinner = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $friday_dinner = $row['friday_dinner'];
                                                $friday_dinner_calorie_count = $row['friday_dinner_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $friday_dinner_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Friday Meal Plan Modal End-->

    <!-- Saturday Meal Plan Modal Start-->
    <div class="modal fade" id="saturdayMealPlanModal" tabindex="-1" aria-labelledby="saturdayMealPlanModal" aria-hidden="false">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <div class="modal-header pb-0 border-0">
                    <h1 class="modal-title h4" id="saturdayMealPlanModal">Saturday Meal Plan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <hr class="mb-0">
                <div class="modal-body undefined">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Breakfast</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.saturday_breakfast_calorie_count, custom_meal_plan.saturday_breakfast FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.saturday_breakfast = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $saturday_breakfast = $row['saturday_breakfast'];
                                                $saturday_breakfast_calorie_count = $row['saturday_breakfast_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $saturday_breakfast_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Lunch</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.saturday_lunch_calorie_count, custom_meal_plan.saturday_lunch FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.saturday_lunch = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $saturday_lunch = $row['saturday_lunch'];
                                                $saturday_lunch_calorie_count = $row['saturday_lunch_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $saturday_lunch_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Snack</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.saturday_snack_calorie_count, custom_meal_plan.saturday_snack FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.saturday_snack = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $saturday_snack = $row['saturday_snack'];
                                                $saturday_snack_calorie_count = $row['saturday_snack_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $saturday_snack_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Dinner</label>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.saturday_dinner_calorie_count, custom_meal_plan.saturday_dinner FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.saturday_dinner = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $saturday_dinner = $row['saturday_dinner'];
                                                $saturday_dinner_calorie_count = $row['saturday_dinner_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $saturday_dinner_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Saturday Meal Plan Modal End-->

    <!-- Sunday Meal Plan Modal Start-->
    <div class="modal fade" id="sundayMealPlanModal" tabindex="-1" aria-labelledby="sundayMealPlanModal" aria-hidden="false">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content overflow-hidden">
                <div class="modal-header pb-0 border-0">
                    <h1 class="modal-title h4" id="sundayMealPlanModal">Sunday Meal Plan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <hr class="mb-0">
                <div class="modal-body undefined">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Breakfast</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.sunday_breakfast_calorie_count, custom_meal_plan.sunday_breakfast FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.sunday_breakfast = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $sunday_breakfast = $row['sunday_breakfast'];
                                                $sunday_breakfast_calorie_count = $row['sunday_breakfast_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $sunday_breakfast_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Lunch</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.sunday_lunch_calorie_count, custom_meal_plan.sunday_lunch FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.sunday_lunch = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $sunday_lunch = $row['sunday_lunch'];
                                                $sunday_lunch_calorie_count = $row['sunday_lunch_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $sunday_lunch_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Snack</label>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.sunday_snack_calorie_count, custom_meal_plan.sunday_snack FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.sunday_snack = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $sunday_snack = $row['sunday_snack'];
                                                $sunday_snack_calorie_count = $row['sunday_snack_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $sunday_snack_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-6">

                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label mb-0">Dinner</label>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="d-flex mb-5">
                                <div>
                                    <?php
                                        $plan_id = $_GET['id'];

                                        $select_query = "SELECT meals.meal_id, meals.title, custom_meal_plan.plan_id, custom_meal_plan.sunday_dinner_calorie_count, custom_meal_plan.sunday_dinner FROM custom_meal_plan INNER JOIN meals WHERE custom_meal_plan.sunday_dinner = meals.meal_id AND custom_meal_plan.plan_id = '$plan_id'";
                                        $result = mysqli_query($conn, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $title = $row['title'];
                                                $meal_id = $row['meal_id'];
                                                $sunday_dinner = $row['sunday_dinner'];
                                                $sunday_dinner_calorie_count = $row['sunday_dinner_calorie_count'];
                                    ?>
                                    <a href="view-meal?id=<?php echo $meal_id; ?>">
                                        <label class="form-label mb-0" for="check_notification_1"><?php echo $title; ?></label>
                                    </a>
                                    <p class="text-sm text-muted"><?php echo $sunday_dinner_calorie_count; ?></p>
                                    <?php
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sunday Meal Plan Modal End-->