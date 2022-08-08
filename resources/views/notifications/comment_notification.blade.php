<div class="mb-1">
    <b>{{json_encode($notification->data['name'])}}</b>
    commented
    - {{json_encode($notification->data['comment'])}}
    <div class="card-footer text-center border-top">
        <form action="{{route('mark')}}" method="POST"
              class="float-right mark-as-read">
            @csrf
            <input type="hidden" name="commId"
                   value="{{ $notification->id }}"/>
            <button class="link-info" type="submit"
                    style="border: none;background-color: transparent">
                Mark as read
            </button>
        </form>
    </div>
</div>
