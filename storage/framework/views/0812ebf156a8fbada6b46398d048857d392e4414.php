

<?php $__env->startSection('content'); ?>
    

<div class="box login-box-body">
        <div class="box-header with-border">
          <h3 class="box-title">Payment using Bkash</h3>
          <h4 style="color:red;">
            <?php echo e(isset($p)?$p:'', false); ?>

          </h4>
          <p>
            Brac Bank 
ACC : 1304104667580001
Name : Md S Ahmed 
<br>
বিকাশ থেকে যেভাবে ব্র্যাক ব্যাঙ্ক একাউন্টে টাকা পাঠাবেন:

আরো > ট্রান্সফার মানি > ব্যাংক একাউন্ট> ব্র্যাক ব্যাংক
সিলেক্ট - অন্যের তারপর ব্যাঙ্ক একাউন্ট নাম্বার এবং নাম
          </p>
          <p>
            <b>Brac Bank ACC : 1304104667580001</b>
          </p>
        </div> <!-- /.box-header -->
        <div class="box-body">
            <form action="<?php echo e(route('admin.submitBkash'), false); ?>" method="post">
              <?php echo e(csrf_field(), false); ?>

              <input type="hidden" class="form-control" id="email" name="id" value="<?php echo e($merchant->shop_id, false); ?>">

              <div class="form-group">
                <label for="email">Bkash No:</label>
                <input type="number" class="form-control" id="email" name="bkash" required>
              </div>
              <div class="form-group">
                <label for="pwd">Transaction ID:</label>
                <input type="text" class="form-control" id="pwd" name="txtid" required>
              </div>
             
              <button type="submit" class="btn btn-default">Submit</button>
            </form>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/amraibes/public_html/resources/views/auth/bkash.blade.php ENDPATH**/ ?>