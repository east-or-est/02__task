<div>
    <?php
    $newDate = [];
    /*
    if(date_default_timezone_get() !== 'Asia/Tokyo'){
        
    }
    */
    ?>
    @foreach ($results['items'] as $res)
        <?php array_push($newDate, strtotime($res['_sys']['updatedAt'])) ?>
    @endforeach
    <?php
    $newDate = date('Y/m/d H:i:s', max($newDate));
    $newDate = new DateTime($newDate);
    $newDate->setTimeZone( new DateTimeZone('Asia/Tokyo') );
    ?>
    <p>最終更新日：{{ $newDate->format('Y/m/d G時i分s秒') }}</p>
    @foreach ($results['items'] as $res)
        <section class="task">
            <header class="task-head">
                <div class="task-title-wrap">
                    <h2 class="task-title">{{ $res['title'] }}</h2>
                    <ul class="task-cat">
                    @foreach ($res['task-type'] as $cat)
                        <li date-cat="{{ $cat['slug'] }}" style='background-color:{{ $cat['color-tag'] }}'>{{ $cat['title'] }}</li>
                    @endforeach
                </ul>
                </div>
                @if ( $res['status']['color-tag'] !== '' ) 
                    <div class="task-status" style='background-color:{{ $res['status']['color-tag'] }}'>
                        <span>
                            {{ $res['status']['title'] }}
                        </span>
                    </div>
                @else
                    <div class="task-status">
                        <span>
                            {{ $res['status']['title'] }}
                        </span>
                    </div>
                @endif
                <div class="task-h-meta">
                    <?php
                    $date = new DateTime($res['date']);
                    $date->setTimeZone( new DateTimeZone('Asia/Tokyo') );
                    ?>
                    <time class="task-date" datetime={{ $date->format('Y-m-d') }} data-text="公開日：">{{ $date->format('Y/m/d') }}</time>
                </div>
            </header>
            <div class="task-main">
                @if( $res['desc'] !== '' ) 
                    <div class="task-desc">
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
                <?php
                    $start_date = false;
                    $end_date = false;
                    if ( $res['start-date'] !== '' ) {
                        $start_date = new DateTime($res['start-date']);
                        $start_date->setTimeZone( new DateTimeZone('Asia/Tokyo') );
                    }
                    if ( $res['end-date'] !== '' ) {
                        $end_date = new DateTime($res['end-date']);
                        $end_date->setTimeZone( new DateTimeZone('Asia/Tokyo') );
                    }
                ?>
            </div>
            <footer class="task-foot">
                @if ( $start_date || $end_date ) 
                    <div class="task-schedule">
                        <h3 class="task-schedule-title">スケジュール</h3>
                        <div class="task-schedule-desc">
                            <p>
                                @if ( $start_date && $end_date ) 
                                    {{ $start_date->format('Y/m/d') }} 〜 {{ $end_date->format('Y/m/d') }}
                                @elseif ( $start_date ) 
                                    {{ $start_date->format('Y/m/d') }} 〜
                                @elseif ( $end_date ) 
                                    〜 {{ $end_date->format('Y/m/d') }}
                                @endif
                            </p>
                        </div>
                    </div>
                @endif
                @if( !empty($res['skill']) ) 
                    <ul class="task-skill">
                        @foreach ($res['skill'] as $skill)
                            <li date-skill="{{ $skill['slug'] }}">{{ $skill['title'] }}</li>
                        @endforeach
                    </ul>
                @endif
            </footer>
        </section>
    @endforeach
</div>