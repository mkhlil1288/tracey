

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Test Map</div>

                    <div class="card-body">
                        <div id="test_map" style="height: 300px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<?php echo App\Helpers\MapEngine::scripts(); ?>

<script>
    new BravoMapEngine('test_map',{
        fitBounds:true,
        center:[51.505, -0.09],
        zoom:6,
        ready: function (engineMap) {
            console.log(engineMap);
            engineMap.on('click',function (dataLatLng) {
                console.log(dataLatLng);
                engineMap.clearMarkers();
                engineMap.addMarker([dataLatLng.lat,dataLatLng.lng],{
                    icon_options:{
                      
                    }
                });
            })
        }
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/m5lil/Sites/mytravel/resources/views/test.blade.php ENDPATH**/ ?>