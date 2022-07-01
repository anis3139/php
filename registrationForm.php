<div class="mb-2">
    <label for="name" class="form-label">Name</label>
    <input required type="text" class="form-control form-field" id="name" name="name">
</div>
<div class="mb-2">
    <label for="email" email="form-label">Email</label>
    <input required type="email" class="form-control form-field" id="email" name="email">
</div>
<div class="mb-2">
    <label for="phone" class="form-label">Phone</label>
    <input required type="text" class="form-control form-field" id="phone" name="phone">
</div>

<div class="mb-2">
    <label for="gender" class="form-label">Gender</label>
    <select name="gender" required id="gender" class="form-control form-field">
        <option value="" selected>--select--</option>
        <option value="1">Male</option>
        <option value="0">Female</option>
    </select>
</div>

<div class="mb-2">
    <label for="dob" class="form-label">Date of Birth</label>
    <input required type="date" class="form-control form-field" id="dob" name="dob">
</div>

<div class="mb-2">
    <label for="role" class="form-label">Role</label>
    <select name="role" required id="role" class="form-control form-field">
        <option value="" selected>--select--</option>
        <option value="user">user</option>
        <option value="admin">admin</option>
        <option value="editor">editor</option>
    </select>
</div>

<div class="mb-2">
    <label for="password" class="form-label">Password</label>
    <input required minlength="5" type="password" class="form-control form-field" id="password" name="password">
</div>
<div class="mb-2 row">
    <button type="submit" class="btn btn-primary">Sign Up</button>
</div>