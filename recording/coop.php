          <table class="table table-striped">
              <tbody>
                <tr>
                  <th>Coops Taken</th>
                  <th>Coops Returned</th>
                  <th>Gross Weight</th>
                  <th>Timein (Farm)</th>
                </tr>
                <tr>
                  <td><input type="number" class="form-control" id="name" name="coops_taken"></td>
                  <td><input type="number" class="form-control" id="name" name="coops_return"></td>
                  <td><input type="text" class="form-control" id="name" name="gross"></td>
                  <td><input type="time" class="form-control" id="name" name="timein_farm"></td>
                </tr>
                <tr>
                  <th>Time Taken</th>
                  <th>Time Returned</th>
                  
                  <th>Load Start</th>
                </tr>
                <tr>
                  <td><input type="time" class="form-control" id="name" name="time_taken"></td>
                  <td><input type="time" class="form-control" id="name" name="time_return"></td>
                  
                  <td><input type="time" class="form-control" id="name" name="load_start"></td>
                </tr>
                <tr>
                  <th>Date Taken</th>
                  <th>Date Returned</th>
                  <th>Net Weight</th>
                  <th>Load Finished</th>
                </tr>
                <tr>
                  <td><input type="date" class="form-control" id="name" name="date_taken"></td>
                  <td><input type="date" class="form-control" id="name" name="date_return"></td>
                  <td><input type="text" class="form-control" id="name" name="net_weight"></td>
                  <td><input type="time" class="form-control" id="name" name="load_finish"></td>
                </tr>
                <tr>
                  <th>Guard</th>
                  <th>Guard</th>
                  <th>DOA Pieces</th>
                  <th>Hauler/Truck Plate No.</th>
                </tr>
                <tr>
                  <td>
                    <select class="form-control select2" style="width: 100%;" name="guard_taken" required>
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
                    <select class="form-control select2" style="width: 100%;" name="guard_return" required>
                          <?php
                             include('../dist/includes/dbcon.php');
                              $query2=mysqli_query($con,"select * from personnel order by personnel_name")or die(mysqli_error());
                                while($row2=mysqli_fetch_array($query2)){
                            ?>
                              <option><?php echo $row2['personnel_name'];?></option>
                            <?php }?>
                          </select>
                  </td>
                  <td><input type="number" class="form-control" id="name" name="doa_pcs"></td>
                  <td><input type="text" class="form-control" id="name" name="plateno"></td>
                </tr>
                <tr>
                  <th>DOA Weight</th>
                  <th>Prepared By</th>
                  <th>Birds Condition</th>
                  <th>Reason</th>
                </tr>
                <tr>
                  <td><input type="text" class="form-control" id="name" name="doa_weight"></td>
                  <td><input type="text" class="form-control" id="name" name="driver"></td>
                  <td>
                    <div class="checkbox">
                    <label>
                      <input type="radio" name="status" value="basa">
                      Basa
                    </label>
                    <label>
                      <input type="radio" name="status" value="dili basa">
                      Dili Basa
                    </label>
                  </div>
                  </td>
                  <td>
                    <textarea class="form-control" rows="3" placeholder="Reason" name="reason"></textarea>
                  </td>
                </tr>
              </tbody>
          </table>