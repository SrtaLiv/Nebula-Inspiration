import { cn } from "@/lib/utils";
import { SharedData } from "@/types";
import { Head, Link, useForm, usePage } from '@inertiajs/react';
import { title } from "process";

interface MainLayoutProps {
    children: React.ReactNode;
    className?: string;
    title?: string;
}

export const MainLayout = ({
    children,
    className = '',
    title = 'Home',
}: MainLayoutProps) => {
    const { auth } = usePage<SharedData>().props;

    return (
        <>
            <Head title={title} />
            <header className="mb-6 w-full max-w-[335px] text-sm lg:max-w-4xl">
                <nav className="flex items-center justify-end gap-4">
                    {auth.user ? (
                        <Link href={route('dashboard')} className="...">Dashboard</Link>
                    ) : (
                        <>
                            <Link href={route('login')} className="...">Login</Link>
                            <Link href={route('register')} className="...">Sign up</Link>
                            <Link href={route('home')} className="...">Home</Link>
                            <Link href={route('upload')} className="...">Subir</Link>
                        </>
                    )}
                </nav>
            </header>
            <main className={cn("min-h-screen w-full flex flex-col", className)} >
                {children}
            </main>

            {/* <Footer/> */}
        </>
    )

}