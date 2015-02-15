@foreach ($streams as $stream)
    <div class="panel {{ (class_basename($stream->content_type) == 'Tugas') ? 'panel-success' : 'panel-info' }}">
        <div class="panel-body">
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="{{ asset('assets/img.svg') }}" alt="...">
                </a>

                <div class="media-body">
                    <h4 class="media-heading">
                        {{ $stream->user->nama }}
                        @if (class_basename($stream->content_type) == 'Pengumuman')
                            <small>membuat pengumuman</small>
                        @elseif (class_basename($stream->content_type) == 'Tugas')
                            <small>membuat tugas</small>
                        @endif
                        <small> - {{ $stream->created_at->diffForHumans() }}</small>
                    </h4>
                    <hr style="margin: 5px 0"/>

                    @if (class_basename($stream->content_type) == 'Pengumuman')
                        <p>{{ $stream->content->content }}</p>
                    @elseif (class_basename($stream->content_type) == 'Tugas')
                        <p>
                            <strong class="text-muted">Judul tugas:</strong> {{ $stream->content->judul_tugas }}<br/>
                            <strong class="text-muted">Deskripsi:</strong> {{ $stream->content->deskripsi }}<br/>
                            <p>
                                <strong class="text-muted">Batas Akhir:</strong> {{ $stream->content->batas_akhir->diffForHumans() }}<br/>
                            </p>
                        </p>
                        <a href="#">Detail tugas</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endforeach