          <table class="table table-striped">
              <tbody>
                <tr>
                  <th>Truck Seal</th>
                  <th>Time Weighed</th>
                  <th>Delivery Date</th>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" id="name" name="seal"></td>
                  <td><input type="time" class="form-control" id="name" name="time_weighed"></td>
                  <td><input type="date" class="form-control" id="name" name="date"></td>
                </tr>
                <tr>
                  <th>Trip #</th>
                  <th>Ave. Live Weight</th>
                  <th>Grower</th>
                </tr>
                <tr>
                  <td><input type="number" class="form-control" id="name" name="trips"></td>
                  <td><input type="text" class="form-control" id="name" name="alw"></td>
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
                  <td><input type="number" class="form-control" id="name" name="crew"></td>
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
                      <input type="radio" name="destination" value="live">
                      Live
                    </label>
                    <label>
                      <input type="radio" name="destination" value="process">
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
                  <td><input type="time" class="form-control" id="name" name="timeout_farm"></td>
                  <td><input type="text" class="form-control" id="name" name="birdspercoop"></td>
                  <td><input type="time" class="form-control" id="name" name="timein"></td>
                </tr>
                <tr>
                  <th>Pcs. Hauled</th>
                  <th>No. of Coops Without Cover</th>
                  <th>House No.</th>
                </tr>
                <tr>
                  <td><input type="number" class="form-control" id="name" name="pcshauled"></td>
                  <td><input type="number" class="form-control" id="name" name="coopswocover"></td>
                  <td><input type="number" class="form-control" id="name" name="houseno"></td>
                </tr>
                <tr>
                  <th>Farm Checker</th>
                  <th>Date Feed</th>
                  <th>Time Feed</th>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" id="name" name="farm_checker"></td>
                  <td><input type="date" class="form-control" id="name" name="datefeed"></td>
                  <td><input type="time" class="form-control" id="name" name="timefeed"></td>
                </tr>
              </tbody>
          </table>