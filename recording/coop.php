          <table class="table table-striped">
              <tbody>
                <tr>
                  <th># of Coops Taken</th>
                  <th># ofCoops Returned</th>
                  <th>Gross Weight</th>
                </tr>
                <tr>
                  <td><input type="number" class="form-control" id="name" name="coops_taken"></td>
                  <td><input type="number" class="form-control" id="name" name="coops_return"></td>
                  <td><input type="text" class="form-control" id="name" name="gross"></td>
                </tr>
                <tr>
                  <th>Time Taken</th>
                  <th>Time Returned</th>
                  <th>Coops Weight</th>
                </tr>
                <tr>
                  <td><input type="time" class="form-control" id="name" name="time_taken"></td>
                  <td><input type="time" class="form-control" id="name" name="time_return"></td>
                  <td><input type="text" class="form-control" id="name" name="coops_weight"></td>
                </tr>
                <tr>
                  <th>Date Taken</th>
                  <th>Date Returned</th>
                  <th>Net Weight</th>
                </tr>
                <tr>
                  <td><input type="date" class="form-control" id="name" name="date_taken"></td>
                  <td><input type="date" class="form-control" id="name" name="date_return"></td>
                  <td><input type="text" class="form-control" id="name" name="net_weight"></td>
                </tr>
                <tr>
                  <th>Guard</th>
                  <th>Guard</th>
                  <th>DOA Pieces</th>
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
                </tr>
                <tr>
                  <th></th>
                  <th></th>
                  <th>DOA Weight</th>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td><input type="text" class="form-control" id="name" name="doa_weight"></td>
                </tr>
              </tbody>
          </table>