          <table class="table table-striped">
              <tbody>
                <tr>
                  <th>Grower</th>
                  <th>Pcs. hauled</th>
                  <th>House #</th>
                  <th>Farm Checker</th>
                  <th>Date/Time Feed</th>
                </tr>
                <tr>
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
                  <td><input type="number" class="form-control" id="name" name="pcshauled"></td>
                  <td><input type="number" class="form-control" id="name" name="houseno"></td>
                  <td><input type="text" class="form-control" id="name" name="farm_checker"></td>
                  <td><input type="date" class="form-control" id="name" name="feed"></td>
                </tr>
                <tr>
                  <th>Time Weighed</th>
                  <th>Average Live Weight</th>
                  <th>Weigher</th>
                  <th>Birds Per Coop</th>
                  <th>Coops w/o Cover</th>

                </tr>
                <tr>
                  <td><input type="time" class="form-control" id="name" name="time_weighed"></td>
                  <td><input type="text" class="form-control" id="name" name="alw"></td>
                  <td><input type="text" class="form-control" id="name" name="weigher"></td>
                  <td><input type="text" class="form-control" id="name" name="birdspercoop"></td>
                  <td><input type="number" class="form-control" id="name" name="coopswocover"></td>
                </tr>
                
              </tbody>
          </table>