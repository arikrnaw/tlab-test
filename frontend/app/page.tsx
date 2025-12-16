"use client";

import { useEffect, useState } from "react";
type Resep = {
  id: number;
  nama_resep: string;
  id_kategori_makanan: number;
  deskripsi: string;
};

// export const api = axios.create({
//   baseURL: process.env.NEXT_PUBLIC_API_URL || "http://localhost:8000/api",
//   headers: {
//     "Content-Type": "application/json",
//   },
// });

// const resepApi = {
//   create: (data: Resep) => api.post("/resep", data),
// };

// const handleSubmit = async (event: React.FormEvent) => {
//   event.preventDefault();
//   try {
//     const response = await fetch("/api/resep", {
//       method: "POST",
//       headers: {
//         "Content-Type": "application/json",
//       },
//       body: JSON.stringify(resepApi),
//     });
//     if (!response.ok) {
//       throw new Error("Failed to create resep");
//     }
//   } catch (error) {
//     console.error(error);
//   }
// };

export default function DaftarResep() {
  const [resep, setResep] = useState<Resep[]>([]);

  useEffect(() => {
    const fetchResep = async () => {
      const response = await fetch("http://localhost:8000/api/resep");
      const data = await response.json();
      setResep(data);
    };
    fetchResep();
  }, []);

  return (
    <div>
      <h1>Daftar Resep</h1>
      <ul>
        {resep.map((resep) => (
          <li key={resep.id}>{resep.nama_resep}</li>
        ))}
      </ul>
    </div>
  );
}
