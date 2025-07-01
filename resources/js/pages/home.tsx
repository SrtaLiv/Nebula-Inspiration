import { MainLayout } from '@/components/main-layout';
import { NavUser } from '@/components/nav-user';
import Tag from '@/components/tags';
import { Card } from '@/components/ui/card';
import { type SharedData } from '@/types';
import { Head, Link, useForm, usePage } from '@inertiajs/react';

export interface ImageType {
    nombre: string;
}

export default function Home2({ images, tags, activeTag }) {
    const { auth } = usePage<SharedData>().props;
    console.log(tags);
    console.log(images);
    return (
        <MainLayout
            className='bg-red-200'
            title="Inicio"
        >
            <div className="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#FFFFF] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]">
                <div className='flex gap-2'>
                    {tags.map((tag) => (
                        <Link
                            key={tag.id}
                            href={`/home/${tag.id}`}
                            className={`font-sans px-2 py-1 rounded-2xl ${activeTag == tag.id ? 'bg-purple-300 text-purple-700' : 'bg-gray-200 text-black hover:bg-gray-300'
                                }`}
                        >
                            {tag.name}
                        </Link>
                    ))}

                    {/* <Tag nombre="Todo" select={true} />
                    <Tag nombre="Mobile" />
                    <Tag nombre="Desktop" /> */}
                </div>

                <div className='flex flex-col md:flex-row w-full gap-2'>
                    {
                        images.map((image) => (
                            <div key={image.id} className="w-1/3 flex flex-col items-center">
                                <Card>
                                    <img src={image.url} alt=""
                                        className='w-full h-auto rounded' />
                                </Card>
                                <span className=' text-xs'>{image.name}</span>
                            </div>
                        ))
                    }
                </div>
            </div>
        </MainLayout >
    );
}
