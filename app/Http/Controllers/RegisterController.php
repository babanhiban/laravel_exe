
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

public function showRegisterForm()
{
    return view('auth.register');
}

public function register(Request $request)
{
    $request->validate([
        'username' => 'required|string|max:255',
        'email' => 'required|email|unique:users,user_email',
        'password' => 'required|min:6|confirmed',
    ]);

    User::create([
        'user_name' => $request->username,
        'user_email' => $request->email,
        'user_password' => Hash::make($request->password),
        'create_at' => now(),
    ]);

    return redirect()->route('login')->with('success', 'Đăng ký thành công!');
}
