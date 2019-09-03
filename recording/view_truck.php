          <table class="table table-striped">
              <tbody>
                <tr>
                  <th>Truck Seal</th>
                  <th>Time Weighed</th>
                  <th>Delivery Date</th>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" id="name" name="seal" value="<?php echo $row['truck_seal'];?>"></td>
                  <td><input type="time" class="form-control" id="name" name="time_weighed" value="<?php echo $row['timeweighed'];?>"></td>
                  <td><input type="date" class="form-control" id="name" name="date" value="<?php echo $row['delivery_date'];?>"></td>
                </tr>
                <tr>
                  <th>Trip #</th>
                  <th>Ave. Live Weight</th>
                  <th>Grower</th>
                </tr>
                <tr>
                  <td><input type="number" class="form-control" id="name" name="trips" value="<?php echo $row['tripno'];?>"></td>
                  <td><input type="text" class="form-control" id="name" name="alw" value="<?php echo $row['alw'];?>"></td>
                  <td>
                    <select class="form-control select2" style="width: 100%;" name="grower" required>
                      <?php
                       include('../dist/includes/dbcon.php');
                        $query2=mysqli_query($con,"select * from grower order by grower_name")or die(mysqli_error());
                          while($row2=mysqli_fetch_array($query2)){
                          ?>
                            <option value="<?php echo $row2['grower_id'];?>"><?php echo $row2['grower_name'];?></option>
                        <?php }?>
                    </select>
                  </td>
                </tr>
                <tr>
                  <th>No. of Crew</th>
                  <th>Weigher</th>
                  <th>Destination</th>
                </tr>
                <tr>
                  <td><input type="number" class="form-control" id="name" name="crew" value="<?php echo $row['noofcrew'];?>"></td>
                  <td>
                    <select class="form-control select2" style="width: 100%;" name="weigher" required>
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
                    <div class="checkbox">
                    <label>
                      <input type="radio" name="destination" value="live" <?php if ($row['destination']=="live") echo "checked";?>>
                      Live
                    </label>
                    <label>
                      <input type="radio" name="destination" value="process" <?php if ($row['destination']=="process") echo "checked";?>>
                      Process
                    </label>
                  </div>
                  </td>
                </tr>
                <tr>
                  <th>Timeout Farm</th>
                  <th>Birds Per Coop</th>
                  <th>Timein Plant</th>
                </tr>
                <tr>
                  <td><input type="time" class="form-control" id="name" name="timeout_farm" value="<?php echo $row['timeoutfarm'];?>"></td>
                  <td><input type="text" class="form-control" id="name" name="birdspercoop" value="<?php echo $row['birdspercoop'];?>"></td>
                  <td><input type="time" class="form-control" id="name" name="timein" value="<?php echo $row['timeinplant'];?>"></td>
                </tr>
                <tr>
                  <th>Pcs. Hauled</th>
                  <th>No. of Coops Without Cover</th>
                  <th>House No.</th>
                </tr>
                <tr>
                  <td><input type="number" class="form-control" id="name" name="pcshauled" value="<?php echo $row['pcshauled'];?>"></td>
                  <td><input type="number" class="form-control" id="name" name="coopswocover" value="<?php echo $row['coopswocover'];?>"></td>
                  <td><input type="number" class="form-control" id="name" name="houseno" value="<?php echo $row['houseno'];?>"></td>
                </tr>
                <tr>
                  <th>Farm Checker</th>
                  <th>Date Feed</th>
                  <th>Time Feed</th>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" id="name" name="farm_checker" value="<?php echo $row['farmchecker'];?>"></td>
                  <td><input type="date" class="form-control" id="name" name="datefeed" value="<?php echo $row['datefeed'];?>"></td>
                  <td><input type="time" class="form-control" id="name" name="timefeed" value="<?php echo $row['timefeed'];?>"></td>
                </tr>
              </tbody>
          </table>