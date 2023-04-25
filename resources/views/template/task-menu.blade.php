<div class="tasks-menu">
    <ul data-sel="{{ isset($sel) ? $sel : false }}">
        <li data-menu="仕事タスク">
            <a href="{{ url('/') }}">仕事タスク</a>
        </li>
        <li data-menu="個人タスク">
            <a href="{{ url('/myself/') }}">個人タスク</a>
        </li>
        <li data-menu="対応グラフ">
            <a href="{{ url('/graph/') }}">対応グラフ</a>
        </li>
        <li data-menu="目標">
            <a href="{{ url('/challenge/') }}">目標</a>
        </li>
    </ul>
</div>