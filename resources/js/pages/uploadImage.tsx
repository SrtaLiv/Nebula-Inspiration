import { type SharedData } from '@/types';
import { Head, Link, useForm, usePage } from '@inertiajs/react';

export default function Welcome() {
    const { auth } = usePage<SharedData>().props;

    const { data, setData, post, processing, errors, progress } = useForm({
        file: null as File | null,
        // user_id: auth.user?.id || '',  // Esto carga el id del usuario MALA PRACTICA D: !!! bakaaaa!!!
    });

    function handleChange(e: React.ChangeEvent<HTMLInputElement>) {
        const file = e.target.files?.[0] || null;
        setData('file', file);
    }

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();
        post('/upload-single', {
            forceFormData: true, //permite enviar archivos con useForm
            onSuccess: () => setData('file', null),
        });
    }

    return (
        <>
            <Head title="Welcome">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>

            <div className="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#FFFFF] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]">
                <header className="mb-6 w-full max-w-[335px] text-sm lg:max-w-4xl">
                    <nav className="flex items-center justify-end gap-4">
                        <h1>hasd</h1>
                        {auth.user ? (
                            <Link href={route('dashboard')} className="...">Dashboard</Link>
                        ) : (
                            <>
                                <Link href={route('login')} className="...">Log in</Link>
                                <Link href={route('register')} className="...">Register</Link>
                            </>
                        )}
                    </nav>
                </header>

                <main className="flex w-full max-w-[335px] flex-col-reverse lg:max-w-4xl lg:flex-row bg-white rounded-xl shadow-lg p-8">
                    <h1 className='text-black'>debes registrarte para comenzar a subir!</h1>
                    <a className='text-black' href="/login">Login</a>
                    {auth?.user && (
                        <form
                            encType="multipart/form-data"
                            onSubmit={handleSubmit}
                            className="flex flex-col gap-4 w-full items-center"
                        >
                            <label className="block w-full">
                                <span className="block text-lg font-semibold text-gray-700 mb-2">Sube tu imagen</span>
                                <input
                                    type="file"
                                    name="file"
                                    onChange={handleChange}
                                    className="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                />
                                {errors.file && (
                                    <div className="text-red-500 text-sm mt-1">{errors.file}</div>
                                )}
                            </label>


                            {progress && (
                                <progress value={progress.percentage} max="100" className="w-full">
                                    {progress.percentage}%
                                </progress>
                            )}

                            <button
                                type="submit"
                                disabled={processing}
                                className="mt-4 w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition-colors duration-200"
                            >
                                {/* evita que se envíe el formulario dos veces. */}
                                {processing ? 'Subiendo...' : 'Subir Imagen'}
                            </button>

                        </form>
                    )}

                </main>

                <div className="hidden h-14.5 lg:block"></div>
            </div>
        </>
    );
}
