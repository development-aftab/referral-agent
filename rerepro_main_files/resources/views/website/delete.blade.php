<html>
<form method="POST" ACTION="{{ route('delete-folder-process') }}">
    @csrf()
    <input type="password" name="password" id="password" required>
    <button type="submit">Ok</button>
</form>
</html>