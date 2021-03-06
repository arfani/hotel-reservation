<div class="container bg-light mt-4 mb-4 pb-4">
  <div class="row">
    <div class="col-sm-12">
    <div class="w-100 h-100">
      <h2 class="text-center font-weight-bold mt-3 mb-4">User Hotspot</h2>
      <div class="table-responsive">
      <table id="user-tbl" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Server</th>
            <th>Username</th>
            <th>Password</th>
            <th>Profile</th>
            <th>Uptime</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $ind = 1;
        foreach ($users as $user) { ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php if(isset($user['server'])){ echo $user['server']; }else{ echo ''; } ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php if(isset($user['password'])){ echo $user['password']; }else{ echo ''; }  ?></td>
            <td><?php if(isset($user['profile'])){ echo $user['profile']; }else{ echo ''; }  ?></td>
            <td><?php echo $user['uptime']; ?></td>
            <td><?php if(isset($user['comment'])){ echo $user['comment']; }else{ echo ''; }  ?></td>
            <td><?php echo ($user['disabled'] == 'false' ) ? 'Enabled' : 'Disabled'; ?></td>
            <td class="text-center action">
              <button class="qrcode-show btn btn-primary btn-sm" value="<?php echo $user['.id']; ?>" <?php echo ($no == 2) ? 'disabled' : ''; ?>>
                <span class="fa fa-qrcode">
                </span>
              </button>
              <button class="user-remove btn btn-danger btn-sm" value="<?php echo $user['.id']; ?>" <?php echo ($no == 2) ? 'disabled' : ''; ?>>
                <span class="fa fa-trash"></span>
              </button>
            </td>
          </tr> <?php } ?>
        </tbody>
      </table>
      </div>
    </div>

    <?php $this->load->view('forms/qrcode_modal'); ?>
    </div>
  </div>
</div>
