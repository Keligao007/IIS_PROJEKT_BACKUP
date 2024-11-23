

<?php $__env->startSection('content'); ?>
<h1>Kategória: <?php echo e($kategoria->meno); ?></h1>

<h2>Atribúty</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Názov</th>
            <th>Akcie</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $kategoria->atributy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atribut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($atribut->id); ?></td>
            <td><?php echo e($atribut->nazov); ?></td>
            <td>
                <form action="<?php echo e(route('delete_atribut', ['id' => $kategoria->id, 'atributId' => $atribut->id])); ?>" method="POST" onsubmit="return confirm('Naozaj chcete zmazať tento atribút?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit">Zmazať</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>


<h2>Pridať nový atribút</h2>
<form action="<?php echo e(route('add_atribut', $kategoria->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <label for="atribut_id">Atribút:</label>
    <select name="atribut_id" id="atribut_id" required>
        <?php $__currentLoopData = $nepriradeneAtributy; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atribut): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($atribut->id); ?>"><?php echo e($atribut->nazov); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <button type="submit">Pridať</button>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.moderator_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\dashboard\test_project\resources\views/moderator/mod_show_kategorie_detail.blade.php ENDPATH**/ ?>