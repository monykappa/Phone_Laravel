<form action="{{ route('customers.store') }}" method="post">
    @csrf

    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
    </div>

    <div>
        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" id="dob" required>
    </div>

    <div>
        <label for="address">Address</label>
        <textarea name="address" id="address" required></textarea>
    </div>

    <div>
        <label for="is_customer">Is Customer</label>
        <input type="checkbox" name="is_customer" id="is_customer">
    </div>

    <button type="submit">Create Customer</button>
</form>
