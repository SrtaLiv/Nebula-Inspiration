import { useState } from "react";

interface TagProps {
    nombre: string;
    select?: boolean;
}

export default function Tag(
    { nombre, select }: TagProps
) {
    const [isSelect, setSelect] = useState(select ?? false);

    const handleSelect = () => {
        setSelect(!isSelect);
    };
    return (
        <>
            <button
                className={`cursor-pointer bg-[color:var(--primary-100)] font-medium hover:text-purple-400 text-[color:var(--text-light)] px-4 py-1 rounded-full transition-colors duration-200 ease-in-out
 ${isSelect ? 'bg-[color:var(--primary-300)] text-violet-950' : ''
                    }`}
                onClick={handleSelect}
            >
                <h1 className="">{nombre}</h1>
            </button >
        </>
    );
}