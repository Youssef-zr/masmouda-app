<style>
    li strong:first-of-type {
        display: inline-block;
        width: 200px !;
    }
</style>

<ul class="list-group mb-3">
    <li class="list-group-item">
        <strong>
            <i class="fa fa-square gap-1"></i>
            {{__("employees.name")}}:
        </strong>
        <span> {{ $department->name }}</span>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-square gap-1"></i>
            {{__("employees.parent")}}:
        </strong>
        <span> {{ $department->parent->name ?? '---' }}</span>
    </li>
    <li class="list-group-item">
        <strong>
            <i class="fa fa-square gap-1"></i>
            {{__("employees.description")}}:
        </strong>
        <p class='mt-2'> {{ $department->description }}</p>
    </li>
</ul>