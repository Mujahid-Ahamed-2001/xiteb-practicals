<?php 
include '../views/authcheck.php';
include '../db/db.php';
include '../classes/prescription-class.php';
$prescription= new prescription();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include '../views/head.php';
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
                    Dashboard
                </h1>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-3">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Featured Image</th>
                                        <th>Delivery Address</th>
                                        <th>Delivery Date</th>
                                        <th>Delivery Time</th>
                                        <th>Status</th>
                                        <th>Note</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php 
                                $ut=$_SESSION["user_login"]["usertype"];
                                if($ut==0)
                                {
                                    $result=$prescription->user_get_prescription();
                                    $count=mysqli_num_rows($result);
                                    if ($count>0) {
                                        while($row=mysqli_fetch_array($result))
                                        {
                                        ?>
                
                                            <tr>
                                            <td> 
                                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="">
                                                    <img src="../Assets/uploads/<?=$row["source"]?>" alt="" class="feature-image">
                                                </li>
                                                </ul>
                                            </td>
                                            <td><?=$row['delivery_address']?></td>
                                            <td><?=$row['delivery_date']?></td>
                                            <td><?=$row['delivery_time']?></td>
                                            <td>
                                                <?php
                                                if ($row['status']==0) {
                                                ?>
                                                <span class="badge bg-label-warning me-1">Pending</span>
                                                <?php
                                                }
                                                elseif($row['status']==1)
                                                {
                                                    if($row['accept_reject']==1)
                                                    {
                                                        ?>
                                                        <span class="badge bg-label-warning me-1">Outation Accepted</span>
                                                        <?php
                                                    }
                                                    elseif ($row['accept_reject']==0) 
                                                    {
                                                        ?>
                                                        <span class="badge bg-label-warning me-1">Outation rejected</span>
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <span class="badge bg-label-primary me-1">Qouted</span>
                                                        <?php
                                                    }                                                
                                                }
                                                ?>
                                            </td>
                                            <td><?=$row['note']?></td>
                                            <td>
                                            <?php
                                                if ($row['status']==1) {
                                                    if($row['accept_reject']==null)
                                                    {
                                                        ?>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="Viewprescription.php?pres_id=<?=$row['pres_id']?>" ><i class="bx bx-edit-alt me-1"></i> View Qoutation</a>
                                                            </div>
                                                        </div>
                                                        <?php 
                                                    }
                                                    
                                                }
                                                else
                                                {
                                                    echo "No Qoutation";
                                                }
                                                ?>
                                            </td>
                                            </tr>
                                        <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Results to Show";
                                    }
                                }
                                else
                                {
                                    $result=$prescription->get_all_prescription();
                                    $count=mysqli_num_rows($result);
                                    if($count>0)
                                    {
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                            ?>
                    
                                                <tr>
                                                <td> 
                                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="">
                                                        <img src="../Assets/uploads/<?=$row["source"]?>" alt="" class="feature-image">
                                                    </li>
                                                    </ul>
                                                </td>
                                                <td><?=$row['delivery_address']?></td>
                                                <td><?=$row['delivery_date']?></td>
                                                <td><?=$row['delivery_time']?></td>
                                                <td>
                                                    <?php
                                                    if ($row['status']==0) {
                                                    ?>
                                                    <span class="badge bg-label-warning me-1">Pending</span>
                                                    <?php
                                                    }
                                                    elseif($row['status']==1)
                                                    {
                                                        if($row['accept_reject']==1)
                                                        {
                                                            ?>
                                                            <span class="badge bg-label-warning me-1">Outation Accepted</span>
                                                            <?php
                                                        }
                                                        elseif ($row['accept_reject']==0) 
                                                        {
                                                            ?>
                                                            <span class="badge bg-label-warning me-1">Outation rejected</span>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <span class="badge bg-label-primary me-1">Qouted</span>
                                                            <?php
                                                        }                                                
                                                    }
                                                    ?>
                                                </td>
                                                <td><?=$row['note']?></td>
                                                <td>
                                                <?php
                                                    if ($row['status']==1) {
                                                        if($row['accept_reject']==null)
                                                        {
                                                            ?>
                                                            <?php 
                                                        }
                                                        
                                                    }
                                                    else
                                                    {
                                                        ?>
                                                        <div class="dropdown">
                                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="create-qoutation.php?pres_id=<?=$row['pres_id']?>" ><i class="bx bx-edit-alt me-1"></i> Create Qoutation</a>
                                                            </div>
                                                        </div>                                                        
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                </tr>
                                            <?php
                                            }
                                    }
                                    else
                                    {
                                        echo "No Result Found";
                                    }
                                }
                                
                                  ?>
                                <tbody>

                                </tbody>
                            </table>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include '../views/foot.php';
    ?>
</body>
</html>