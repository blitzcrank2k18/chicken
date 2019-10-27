<?php
        
                  $queryc=mysqli_query($con,"select * from loops where delivery_id='$id'")or die(mysqli_error($con));
                    $rowc=mysqli_fetch_array($queryc);
                ?> 

          <table class="table table-striped">
              <tbody>
                <tr>
                  <th>Coops Taken</th>
                  <th>Coops Returned</th>
                  <th>Gross Weight</th>
                  <th>Timein (Farm)</th>
                </tr>
                <tr>
                  <td><input type="number" class="form-control" id="name" name="coops_taken" value="<?php echo $rowc['looptaken'];?>"></td>
                  <td><input type="number" class="form-control" id="name" name="coops_return" value="<?php echo $rowc['loopreturn'];?>"></td>
                  <td><input type="text" class="form-control" id="name" name="gross" value="<?php echo $row['gross_weight'];?>"></td>
                  <td><input type="time" class="form-control" id="name" name="timein_farm" value="<?php echo $row['timeinfarm'];?>"></td>
                </tr>
                <tr>
                  <th>Time Taken</th>
                  <th>Time Returned</th>
                  <th></th>
                  <th>Load Start</th>
                </tr>
                <tr>
                  <td><input type="time" class="form-control" id="name" name="time_taken" value="<?php echo $rowc['taketime'];?>"></td>
                  <td><input type="time" class="form-control" id="name" name="time_return" value="<?php echo $rowc['returntime'];?>"></td>
                  <td></td>
                  <td><input type="time" class="form-control" id="name" name="load_start" value="<?php echo $row['loadstart'];?>"></td>
                </tr>
                <tr>
                  <th>Date Taken</th>
                  <th>Date Returned</th>
                  <th>Net Weight</th>
                  <th>Load Finished</th>
                </tr>
                <tr>
                  <td><input type="date" class="form-control" id="name" name="date_taken" value="<?php echo $rowc['takedate'];?>"></td>
                  <td><input type="date" class="form-control" id="name" name="date_return" value="<?php echo $rowc['returndate'];?>"></td>
                  <td><input type="text" class="form-control" id="name" name="net_weight" value="<?php echo $row['net_weight'];?>"></td>
                  <td><input type="time" class="form-control" id="name" name="load_finish" value="<?php echo $row['loadfinish'];?>"></td>
                </tr>
                <tr>
                  <th>Guard</th>
                  <th>Guard</th>
                  <th>DOA Pieces</th>
                  <th>Hauler/Truck Plate No.</th>
                </tr>
                <tr>
                  <td>
                    <select class="form-control select2" style="width: 100%;" name="takenguard" required>
                      <option><?php echo $rowc['takenguard'];?></option>
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
                          <option><?php echo $rowc['returnguard'];?></option>
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
                  <td><input type="text" class="form-control" id="name" name="plateno" value="<?php echo $row['plateno'];?>"></td>
                </tr>
                <tr>
                  <th>DOA Weight</th>
                  <th>Prepared By</th>
                  <th>Birds Condition</th>
                  <th>Reason</th>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" id="name" name="doa_weight" value="<?php echo $row['doa_weight'];?>"></td>
                  <td><input type="text" class="form-control" id="name" name="driver" value="<?php echo $row['driver'];?>"></td>
                  <td>
                    <div class="checkbox">
                    <label>
                      <input type="radio" name="status" value="basa" <?php if ($row['birdstatus']=="basa") echo "checked";?>>
                      Basa
                    </label>
                    <label>
                      <input type="radio" name="status" value="dili basa" <?php if ($row['birdstatus']=="dili basa") echo "checked";?>>
                      Dili Basa
                    </label>
                  </div>
                  </td>
                  <td>
                    <textarea class="form-control" rows="3" placeholder="Reason" name="reason"><?php echo $row['reason'];?></textarea>
                  </td>
                </tr>
              </tbody>
          </table>