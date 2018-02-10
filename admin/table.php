<?php
  include('../db.php');
?>
<!--<div class="container-fluid">-->
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title">
                    <?php
                      if($dept == 'ae')
                        echo "Aeronautical Events";
                      else if($dept == 'cse')
                        echo "CS / IS Events";
                      else if($dept == 'cv')
                        echo "Civil Engineering Events";
                      else if($dept == 'ec')
                        echo "E & C Events";
                      else if($dept == 'me')
                        echo "Mechanical Engineering Events";
                      else if($dept == 'cul')
                        echo "Cultural Events";
                    ?></h4>
                    <p class="card-category">Online Registration details</p>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Members</th>
                            <th>Event</th>
                        </thead>
                        <tbody>
                        <?php
                          $sql = "SELECT * FROM `registration` WHERE `dept`='$dept' order by `event`";
                          $res = $msqi->query($sql);
                          $i = 0;
                          while($row = $res->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['members']; ?></td>
                                <td><?php echo $row['event']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--<div class="col-md-12">
            <div class="card card-plain table-plain-bg">
                <div class="card-header ">
                    <h4 class="card-title">Table on Plain Background</h4>
                    <p class="card-category">Here is a subtitle for this table</p>
                </div>
                <div class="card-body table-full-width table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Salary</th>
                            <th>Country</th>
                            <th>City</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Dakota Rice</td>
                                <td>$36,738</td>
                                <td>Niger</td>
                                <td>Oud-Turnhout</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Minerva Hooper</td>
                                <td>$23,789</td>
                                <td>Curaçao</td>
                                <td>Sinaai-Waas</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Sage Rodriguez</td>
                                <td>$56,142</td>
                                <td>Netherlands</td>
                                <td>Baileux</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Philip Chaney</td>
                                <td>$38,735</td>
                                <td>Korea, South</td>
                                <td>Overland Park</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Doris Greene</td>
                                <td>$63,542</td>
                                <td>Malawi</td>
                                <td>Feldkirchen in Kärnten</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Mason Porter</td>
                                <td>$78,615</td>
                                <td>Chile</td>
                                <td>Gloucester</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>-->
    </div>
<!--</div>-->