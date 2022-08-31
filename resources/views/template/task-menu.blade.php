<div class="tasks-menu">
    <ul data-sel="{{ isset($sel) ? $sel : false }}">
        <li data-menu="仕事タスク">
            <a href="{{ url('/') }}">仕事タスク</a>
        </li>
        <li data-menu="個人タスク">
            <a href="{{ url('/myself/') }}">個人タスク</a>
        </li>
        <li data-menu="仕事対応グラフ">
            <a href="{{ url('/graph/') }}">仕事対応グラフ</a>
        </li>
        <li data-menu="個人対応グラフ">
            <a href="{{ url('/myself/graph/') }}">個人対応グラフ</a>
        </li>
    </ul>
</div>