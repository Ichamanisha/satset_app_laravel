<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800">Detail Aduan</h2>
     <?php $__env->endSlot(); ?>

    <div class="py-8 max-w-2xl mx-auto px-4">
        <div class="bg-white rounded shadow p-6 space-y-4">

            <div class="flex justify-between items-center">
                <h3 class="text-xl font-bold"><?php echo e($report->title); ?></h3>
                <span class="px-3 py-1 rounded-full text-sm font-semibold
                    <?php echo e($report->status === 'Pending' ? 'bg-yellow-100 text-yellow-700' : ''); ?>

                    <?php echo e($report->status === 'Proses' ? 'bg-blue-100 text-blue-700' : ''); ?>

                    <?php echo e($report->status === 'Selesai' ? 'bg-green-100 text-green-700' : ''); ?>">
                    <?php echo e($report->status); ?>

                </span>
            </div>

            <p><span class="font-medium">📍 Lokasi:</span> <?php echo e($report->location); ?></p>
            <p><span class="font-medium">📝 Deskripsi:</span> <?php echo e($report->description); ?></p>
            <p><span class="font-medium">🕐 Dikirim:</span> <?php echo e($report->created_at->format('d M Y, H:i')); ?></p>

            <?php if($report->photo): ?>
                <div>
                    <p class="font-medium mb-1">📷 Foto:</p>
                    <img src="<?php echo e(asset('storage/' . $report->photo)); ?>"
                         class="rounded max-w-full border" alt="Foto aduan">
                </div>
            <?php endif; ?>

            <?php if($report->admin_feedback): ?>
                <div class="bg-blue-50 border border-blue-200 rounded p-4">
                    <p class="font-medium text-blue-700">💬 Balasan Admin:</p>
                    <p class="text-blue-600 mt-1"><?php echo e($report->admin_feedback); ?></p>
                </div>
            <?php endif; ?>

            <a href="<?php echo e(route('reports.index')); ?>" class="text-blue-600 hover:underline text-sm">
                ← Kembali ke Riwayat
            </a>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\Users\Hype G12\satset_app_laravel\resources\views/reports/show.blade.php ENDPATH**/ ?>