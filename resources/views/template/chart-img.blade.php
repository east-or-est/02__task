<div class="graph-box">
    <figure class="graph-image pc">
        <?php $img = isset($filename) ? $filename : 'work'; ?>
        <img src="{{ asset( 'asset/img/graph/chart-' . $img . '.png') }}" alt="">
    </figure>
    <figure class="graph-image sp">
        <?php $img = isset($filename) ? $filename : 'work'; ?>
        <img src="{{ asset( 'asset/img/graph/chart-' . $img . '-sp.png') }}" alt="">
    </figure>
</div>