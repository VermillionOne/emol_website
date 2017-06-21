  <ul class="list-group">
    @foreach ($project_list as $project_list_item)

      <li class="list-group-item">
        <a href="{{ route('projects.show', $project->id) }}">{{ $project_list_item->title }}</a>
      </li>

    @endforeach
  </ul>

  <div class="add-project-button">
    <a href="{{route('projects.create')}}">
      <p class="ion-ios-plus-outline"></p>
    </a>
  </div>
