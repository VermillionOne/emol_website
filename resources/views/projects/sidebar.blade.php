
  <ul class="list-group">
    @foreach ($project_list as $project_list_item)

      <li class="list-group-item">
        <a href="/projects/{{ $project_list_item->id }}">{{ $project_list_item->title }}</a>
      </li>

    @endforeach
  </ul>

  <div>
    <p class="ion-ios-plus-outline"></p>
  </div>
