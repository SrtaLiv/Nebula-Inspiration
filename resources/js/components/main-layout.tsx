import { cn } from "@/lib/utils";
import { Head } from "@inertiajs/react";
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

    return (
        <>
            <Head title={title}/>

            <main className={cn("min-h-screen w-full flex flex-col", className)} >
                {children}
            </main>

            {/* <Footer/> */}
        </>
    )

}