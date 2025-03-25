<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
   /* General Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 10px;
    background-color: #ffffff;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

/* Table Header Styling */
.table thead {
    background-color: #04AA6D;
    color: #ffffff;
    text-align: left;
}

/* Header Row */
.table thead tr {
    font-size: 16px;
}

/* Header Cells */
.table thead th {
    padding: 12px 15px;
    font-weight: bold;
}

/* Table Rows */
.table tbody tr {
    transition: background-color 0.2s ease-in-out;
}

/* Alternating Row Colors */
.table tbody tr:nth-child(odd) {
    background-color: #f8f9fa;
}

/* Hover Effect */
.table tbody tr:hover {
    background-color: #e9ecef;
}

/* Table Data Cells */
.table tbody td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
}

/* Actions Column */
.table tbody td:last-child {
    text-align: center;
}

/* Buttons */
.btn-sm {
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    transition: all 0.2s ease-in-out;
}

.btn-warning {
    background-color: #ffc107;
    border: none;
}

.btn-warning:hover {
    background-color: #e0a800;
}

.btn-danger {
    background-color: #dc3545;
    color: #ffffff;
    border: none;
}

.btn-danger:hover {
    background-color: #c82333;
}




   
</style>
<body>

<div class="container">
    <div style="position:absolute; right: 30px; top:30px; width:350px" >
        <!-- Success & Error Messages -->
        @if(Session::has('success'))
            <p id="successAlert" class="alert alert-success">{{ Session::get('success') }}</p>
        @endif
        @if(Session::has('error'))
            <p id="errorAlert" class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif
    </div>
    <!-- Posts Table -->
    <h2 class="text-center">Your Posts</h2>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Content</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            @forelse($posts as $post)
            @can('view-user-posts',$post->user_id)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{substr($post->title,0,20)}}...</td>
                    <td>{{substr($post->content,0,80)}}...</td>
                    <td>{{$post->created_at}}</td>
                    <td>
                        <a href="{{route('users.posts.edit',['post'=> $post->id])}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{route('users.posts.destroy',['post'=> $post->id])}}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                    
                </tr>
                @endcan
                @empty
                <tr>
                    <td colspan="5" class="text-center">No posts found</td>
                </tr>
            @endforelse
        </thead>
        <tbody>
           
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500); // Remove the element after fade out
        });
</script>
</body>
</html>
