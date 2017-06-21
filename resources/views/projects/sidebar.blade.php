  <?php $user = App\User::find(Auth::user()->id) ?>

  <ul class="list-group">
    @foreach ($user->projects as $project)

      <li class="list-group-item">
        <a href="{{ route('projects.show', $project->id) }}">{{ $project->title }}</a>
      </li>

    @endforeach
  </ul>

  <div class="add-project-button">
    <a href="{{route('projects.create')}}">
      <p><span class="ion-ios-plus-outline"></ul> Add Project</p>
    </a>
  </div>
