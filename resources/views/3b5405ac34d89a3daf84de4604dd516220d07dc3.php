<?php echo $__env->make('layout.cdn', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="<?php echo e(asset('design/header.css')); ?>"/>
<header>
    <div class="text-center">
        <a href="<?php echo e(url('/')); ?>"><img
            src="<?php echo e(asset('images/logos/good_quality_logo.png')); ?>"
            height="50"
            alt="CoolBrand"></a>
        <h1 class="text-white mt-2">
            Legal Notice</h1>
    </div>
</header>

<section class="legal">
    <div class="container">
        <div class="legeltext my-5">
            <h3 class="text-center"></h3>
            <h3>Contact Address:</h3>

            <address>
                PAZ GmbH<br>
                Chamerstrasse 172<br>
                6300 Zug<br>
                Switzerland<br>
                <a href="mailto:contact@pornartistzone.com">contact@pornartistzone.com</a>

            </address>
            <h3>Authorized representative:</h3>
            <i>Robin Heller, Chief Executive Officer</i>
        </div>

    </div>
</section>

<style>

    header {
        background: #7b0000;
        padding: 11px;
    }
</style>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/personalattentio/public_html/developing-streaming/resources/views/legal-notice.blade.php ENDPATH**/ ?>