<?php
        
                  $queryc=mysqli_query($con,"select * from loops where delivery_id='$id'")or die(mysqli_error($con));
                    $rowc=mysqli_fetch_array($queryc);
                ?>       
          <table class="table table-striped">
              <tbody>
                <tr>
                  <th># of Coops Taken</th>
                  <th># of Coops Returned</th>
                  <th>Gross Weight</th>
                </tr>
                <tr>
                  <td><input type="number" class="form-control" id="name" name="coops_taken" value="<?php echo $rowc['looptaken'];?>"></td>
                  <td><input type="number" class="form-control" id="name" name="coops_return" value="<?php echo $rowc['loopreturn'];?>"></td>
                  <td><input type="text" class="form-control" id="name" name="gross" value="<?php echo $row['gross_weight'];?>"></td>
                </tr>
                <tr>
                  <th>Time Taken</th>
                  <th>Time Returned</th>
                  <th>Coops Weight</th>
                </tr>
                <tr>
                  <td><input type="time" class="form-control" id="name" name="time_taken" value="<?php echo $rowc['taketime'];?>"></td>
                  <td><input type="time" class="form-control" id="name" name="time_return" value="<?php echo $rowc['returntime'];?>"></td>
                  <td><input type="text" class="form-control" id="name" name="coops_weight" value="<?php echo $rowc['coops_weight'];?>"></td>
                </tr>
                <tr>
                  <th>Date Taken</th>
                  <th>Date Returned</th>
                  <th>Net Weight</th>
                </tr>
                <tr>
                  <td><input type="date" class="form-control" id="name" name="date_taken" value="<?php echo $rowc['takedate'];?>"></td>
                  <td><input type="date" class="form-control" id="name" name="date_return" value="<?php echo $rowc['returndate'];?>"></td>
                  <td><input type="text" class="form-control" id="name" name="net_weight" value="<?php echo $row['net_weight'];?>"></td>
                </tr>
                <tr>
                  <th>Guard</th>
                  <th>Guard</th>
                  <th>DOA Pieces</th>
                </tr>
                <?php
                  $queryp1=mysqli_query($con,"select * from `loops` where delivery_id='$id'")or die(mysqli_error($con));
                          $rowp1=mysqli_fetch_array($queryp1);
                ?>  

                <tr>
                  <td>
                    <select class="form-control select2" style="width: 100%;" name="takenguard" required>
                            <option><?php echo $rowp1['takenguard'];?></option>
                          <?php
                             include('../dist/includes/dbcon.php');
                              $query2=mysqli_query($con,"select * from personnel order by personnel_name")or die(mysqli_error());
                                while($row2=mysqli_fetch_array($query2)){
                            ?>
                              <option><?php echo $row2['personnel_name'];?></option>
                            <?php }?>
                          </select>
                  </td>
                  <td>
                    <select class="form-control select2" style="width: 100%;" name="returnguard" required>
                            <option><?php echo $rowp1['returnguard'];?></option>
                          <?php
                             include('../dist/includes/dbcon.php');
                              $query2=mysqli_query($con,"select * from personnel order by personnel_name")or die(mysqli_error());
                                while($row2=mysqli_fetch_array($query2)){
                            ?>
                              <option><?php echo $row2['personnel_name'];?></option>
                            <?php }?>
                          </select>
                  </td>
                  <td><input type="number" class="form-control" id="name" name="doa_pcs" value="<?php echo $row['doa_pcs'];?>"></td>
                </tr>
                <tr>
                  <th></th>
                  <th></th>
                  <th>DOA Weight</th>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td><input type="text" class="form-control" id="name" name="doa_weight" value="<?php echo $row['doa_weight'];?>"></td>
                </tr>
              </tbody>
          </table>