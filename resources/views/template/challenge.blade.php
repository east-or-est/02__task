<div>
    <?php
    $newDate = [];
    /*
    if(date_default_timezone_get() !== 'Asia/Tokyo'){
        
    }
    */
    ?>
    <article>
    <h1>
        {{ isset($sel) ? $sel : '目標' }}
    </h1>
    @foreach ($results['items'] as $res)
        <?php array_push($newDate, strtotime($res['_sys']['updatedAt'])) ?>
    @endforeach
    <?php
    $newDate = date('Y/m/d H:i:s', max($newDate));
    $newDate = new DateTime($newDate);
    $newDate->setTimeZone( new DateTimeZone('Asia/Tokyo') );
    ?>
    <p>【最終更新日】<br class="sp">{{ $newDate->format('Y/m/d G時i分s秒') }}</p>
    @foreach ($results['items'] as $res)
        <section class="challenge">
            <header class="challenge-head">
                <h2 class="challenge-title">{{ $res['title'] }}</h2>
            </header>
            <div class="challenge-main">
                @if( $res['desc'] !== '' ) 
                    <div class="challenge-desc">
                        <?php
                            $pattern = [
                                '/<script.*?>.*?<\/script>/is',
                                '/<iframe.*?>.*?<\/iframe>/is'
                            ];
                            $desc = preg_replace($pattern, '', $res['desc']);
                        ?>
                        {!! $desc !!}
                    </div>
                @endif
            </div>
            <footer  class="challenge-foot">
                <div class="challenge-meta">
                    <?php
                    $date = new DateTime($res['date']);
                    $date->setTimeZone( new DateTimeZone('Asia/Tokyo') );
                    ?>
                    <time class="challenge-date" datetime={{ $date->format('Y-m-d') }} data-text="更新日：">{{ $date->format('Y/m/d') }}</time>
                </div>
            </footer>
        </section>
    @endforeach
</div>
</article>