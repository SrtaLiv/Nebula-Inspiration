import { NavUser } from '@/components/nav-user';
import Tag from '@/components/tags';
import { Card } from '@/components/ui/card';
import { type SharedData } from '@/types';
import { Head, Link, useForm, usePage } from '@inertiajs/react';


export interface ImageType {
    nombre: string;
}

export default function Home2({images}) {
    console.log(images);
    // obtener las imagenes de la base de datos
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
            forceFormData: true, //permite enviar archivos con useForm.
            onSuccess: () => setData('file', null),
        });
    }

    return (
        <>
            <Head title="Home">
                <link rel="preconnect" href="https://fonts.bunny.net" />
                <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
            </Head>
            <div className="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#FFFFF] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]">
                <div>navbar fake</div>
                <div className='flex gap-2'>
                    <Tag nombre="Todo" select={true} />
                    <Tag nombre="Mobile" />
                    <Tag nombre="Desktop" />
                </div>

                <div className='flex flex-col md:flex-row w-full gap-2'>
                    {
                        images.map((image) => (
                            <div key={image.id} className="w-1/3 flex flex-col items-center">
                                <Card>
                                    <img src="https://cdn.dribbble.com/userupload/14912901/file/original-54f35b2c851a539d2c2bf4ffe7d12379.png?format=webp&resize=400x300&vertical=center" alt=""
                                        className='w-full h-auto rounded' />
                                </Card>
                                <span className=' text-xs'>{image.name}</span>
                            </div>
                        ))
                    }
                </div>
            </div>
        </>
    );
}
