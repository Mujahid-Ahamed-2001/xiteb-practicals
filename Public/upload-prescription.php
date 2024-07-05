<?php 
include '../views/authcheck.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include '../views/head.php';
    function getFutureTimeSlotsWithinToday() {
        $timeSlots = [];
        $currentTime = new DateTime();
        $endOfDay = new DateTime('tomorrow');
        $endOfDay->modify('midnight');
    
        while ($currentTime < $endOfDay) {
            $timeSlots[] = $currentTime->format('Y-m-d H:i:s');
            $currentTime->modify('+2 hours');
        }
    
        // Remove the last slot if it exceeds the end of the day
        if (end($timeSlots) >= $endOfDay->format('Y-m-d H:i:s')) {
            array_pop($timeSlots);
        }
    
        return $timeSlots;
    }
    ?>
</head>
<body>
    <div class="wrapper">
        <?php 
        include '../views/sidebar.php';
        ?>
        <div class="main p-3">
            <div class="text-center">
                <h1>
                    Upload Prescription
                </h1>
            </div>
            <div class="row">
                <div class="col-md-11">
                    <div class="card p-3">
                        <form action="../handlers/prescription-handler.php" method="post">
                            <div id="preview" class="mb-3"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-lable">Upload Prescription <span class="text-danger">* Max 5 Images</span></label>
                                        <input type="file" id="prescription" name="prescription[]" class="form-control" multiple accept="image/*" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-lable">Delivery Address <span class="text-danger">*</span></label>
                                        <textarea name="delivery-address" id="" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-lable">Delivery Time Slot <span class="text-danger">*</span></label>
                                        <select name="time" id="" class="form-control" required>
                                            <option value="">Select Time</option>
                                            <?php 
                                            $slots = getFutureTimeSlotsWithinToday();
                                            foreach ($slots as $slot) {
                                                ?>
                                                <option value="<?=$slot?>"><?=$slot?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="" class="form-lable">Note <span class="text-danger">*</span></label>
                                        <textarea name="Note" id="" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="upload_prescription">Submit</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../Assets/jquery/upload-prescription.js"></script>
    <?php 
    include '../views/foot.php';
    ?>
</body>
</html>