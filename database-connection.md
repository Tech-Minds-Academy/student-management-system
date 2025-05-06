The error you're encountering:

```
Fatal error: Uncaught Error: Call to a member function prepare() on null
```

means that the `$conn` variable inside your `UserModel` class is `null` — in other words, there's **no active database connection** available when `prepare()` is called.

---

### 🧠 What's going wrong?

In your code:

```php
global $conn;
```

You're trying to use a global `$conn`, but:

- You create the `$conn` inside this line:

```php
$db = new Database();
$conn = $db->getConnection();
```

- But this is **not** global unless explicitly declared global **in the file where it's defined** — which it isn't.

---

### ✅ The Proper Fix

You should **pass the database connection to your `UserModel`**, either via constructor injection or a setter. This is cleaner and more object-oriented.

#### 🔧 Option 1: Constructor Injection (Recommended)

```php
class UserModel
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function createUser($first_name, $last_name, $email, $phone, $password, $role = "user")
    {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (first_name, last_name, email, phone, hashed_password, role) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        if ($stmt === false) {
            die("Prepare failed: " . $this->conn->error);
        }

        $stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone, $hashed_password, $role);
        $stmt->execute();
        $stmt->close();
    }
}
```

And in your controller or wherever you're using `UserModel`:

```php
require_once dirname(__DIR__, 1) . '/config/database.php';

$db = new Database();
$conn = $db->getConnection();

$userModel = new UserModel($conn);
$userModel->createUser('Ali', 'pelumi', 'femi1234@gmail.com', '08067393039', 'your_password_here');
```

---

### 🔧 Option 2: Set Connection Globally (Less Ideal)

If you really want to keep it global (not recommended for modern apps), you need to declare `$conn` as global in the same scope where it’s defined:

```php
global $conn;
$db = new Database();
$conn = $db->getConnection();
```

But again — this is not clean. Use dependency injection instead.

---

Let me know if you want help refactoring your code structure a bit more cleanly, or setting up proper config loading.
