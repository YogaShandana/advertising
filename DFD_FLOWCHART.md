saya # Data Flow Diagram & Flowchart - Website Advertising OnetEchno

## 1. DFD Context Diagram (Level 0)

```mermaid
graph TB
    subgraph External_Entities[" "]
        Pengunjung[👤 Pengunjung Website]
        Admin[👨‍💼 Admin/User]
    end
    
    subgraph System[" "]
        WebsiteSystem[🌐 Sistem Website Advertising<br/>OnetEchno Cahya]
    end
    
    subgraph Database[" "]
        DB[(🗄️ Database<br/>MySQL)]
        Storage[📁 File Storage<br/>Images]
    end
    
    Pengunjung -->|View Layanan<br/>View Tentang Kami<br/>View Kontak| WebsiteSystem
    WebsiteSystem -->|Tampilkan Data<br/>& Images| Pengunjung
    
    Admin -->|Login<br/>Kelola Data| WebsiteSystem
    WebsiteSystem -->|Dashboard<br/>Data Management| Admin
    
    WebsiteSystem <-->|Query/CRUD| DB
    WebsiteSystem <-->|Upload/Retrieve| Storage
    
    style WebsiteSystem fill:#4CAF50,stroke:#2E7D32,stroke-width:3px,color:#fff
    style DB fill:#2196F3,stroke:#1565C0,stroke-width:2px,color:#fff
    style Storage fill:#FF9800,stroke:#E65100,stroke-width:2px,color:#fff
    style Pengunjung fill:#E1F5FE,stroke:#01579B,stroke-width:2px
    style Admin fill:#FFF3E0,stroke:#E65100,stroke-width:2px
```

---

## 2. DFD Level 1 - Proses Utama

```mermaid
graph TB
    Pengunjung[👤 Pengunjung]
    Admin[👨‍💼 Admin]
    
    subgraph Frontend_Process[" Frontend Processes "]
        P1[1.0<br/>Tampilkan<br/>Homepage]
        P2[2.0<br/>Tampilkan<br/>Layanan]
        P3[3.0<br/>Tampilkan<br/>Tentang Kami]
        P4[4.0<br/>Tampilkan<br/>Kontak]
    end
    
    subgraph Backend_Process[" Backend Processes "]
        P5[5.0<br/>Autentikasi<br/>Admin]
        P6[6.0<br/>Kelola<br/>Videotron]
        P7[7.0<br/>Kelola<br/>Baliho]
        P8[8.0<br/>Kelola<br/>Billboard]
        P9[9.0<br/>Kelola<br/>Konten CMS]
    end
    
    subgraph DataStores[" Data Stores "]
        D1[(D1: videotrons)]
        D2[(D2: balihos)]
        D3[(D3: billboards)]
        D4[(D4: hero_sections)]
        D5[(D5: tentang_kami)]
        D6[(D6: kontaks)]
        D7[(D7: users)]
    end
    
    Pengunjung -->|Request| P1
    Pengunjung -->|Request| P2
    Pengunjung -->|Request| P3
    Pengunjung -->|Request| P4
    
    P1 -->|Response| Pengunjung
    P2 -->|Response| Pengunjung
    P3 -->|Response| Pengunjung
    P4 -->|Response| Pengunjung
    
    Admin -->|Login| P5
    P5 -->|Authenticated| P6
    P5 -->|Authenticated| P7
    P5 -->|Authenticated| P8
    P5 -->|Authenticated| P9
    
    P1 -.->|Read Featured| D1
    P1 -.->|Read Featured| D2
    P1 -.->|Read Featured| D3
    P1 -.->|Read| D4
    P1 -.->|Read| D5
    
    P2 -.->|Read All| D1
    P2 -.->|Read All| D2
    P2 -.->|Read All| D3
    P2 -.->|Read| D4
    
    P3 -.->|Read| D4
    P3 -.->|Read| D5
    
    P4 -.->|Read| D4
    P4 -.->|Read| D6
    
    P5 <-.->|Verify| D7
    P6 <-.->|CRUD| D1
    P7 <-.->|CRUD| D2
    P8 <-.->|CRUD| D3
    P9 <-.->|CRUD| D4
    P9 <-.->|CRUD| D5
    P9 <-.->|CRUD| D6
    
    style P1 fill:#81C784,stroke:#388E3C,stroke-width:2px
    style P2 fill:#81C784,stroke:#388E3C,stroke-width:2px
    style P3 fill:#81C784,stroke:#388E3C,stroke-width:2px
    style P4 fill:#81C784,stroke:#388E3C,stroke-width:2px
    style P5 fill:#FFB74D,stroke:#F57C00,stroke-width:2px
    style P6 fill:#FFB74D,stroke:#F57C00,stroke-width:2px
    style P7 fill:#FFB74D,stroke:#F57C00,stroke-width:2px
    style P8 fill:#FFB74D,stroke:#F57C00,stroke-width:2px
    style P9 fill:#FFB74D,stroke:#F57C00,stroke-width:2px
    style D1 fill:#64B5F6,stroke:#1976D2,stroke-width:2px
    style D2 fill:#64B5F6,stroke:#1976D2,stroke-width:2px
    style D3 fill:#64B5F6,stroke:#1976D2,stroke-width:2px
    style D4 fill:#64B5F6,stroke:#1976D2,stroke-width:2px
    style D5 fill:#64B5F6,stroke:#1976D2,stroke-width:2px
    style D6 fill:#64B5F6,stroke:#1976D2,stroke-width:2px
    style D7 fill:#64B5F6,stroke:#1976D2,stroke-width:2px
```

---

## 3. Flowchart - Frontend User Journey

```mermaid
flowchart TD
    Start([🌐 Pengunjung Akses Website])
    Start --> Home{Pilih Menu}
    
    Home -->|Home| HomePage[📱 Lihat Homepage]
    Home -->|Layanan| LayananMenu{Pilih Layanan}
    Home -->|Tentang Kami| TentangKami[ℹ️ Halaman Tentang Kami]
    Home -->|Kontak| Kontak[📞 Halaman Kontak]
    
    HomePage --> LoadFeatured[Load Featured Items:<br/>- Videotron<br/>- Baliho<br/>- Billboard]
    LoadFeatured --> LoadHero1[Load Hero Section]
    LoadHero1 --> LoadTK2[Load Tentang Kami 2]
    LoadTK2 --> DisplayHome[✅ Tampilkan Homepage]
    DisplayHome --> End1([Selesai])
    
    LayananMenu -->|Videotron| Videotron[📺 Halaman Videotron]
    LayananMenu -->|Baliho| Baliho[🪧 Halaman Baliho]
    LayananMenu -->|Billboard| Billboard[📊 Halaman Billboard]
    
    Videotron --> LoadVideotron[Load Semua Data Videotron]
    LoadVideotron --> LoadHero2[Load Hero Section Videotron]
    LoadHero2 --> DisplayVideotron[✅ Tampilkan Daftar Videotron]
    DisplayVideotron --> End2([Selesai])
    
    Baliho --> LoadBaliho[Load Semua Data Baliho]
    LoadBaliho --> LoadHero3[Load Hero Section Baliho]
    LoadHero3 --> DisplayBaliho[✅ Tampilkan Daftar Baliho]
    DisplayBaliho --> End3([Selesai])
    
    Billboard --> LoadBillboard[Load Semua Data Billboard]
    LoadBillboard --> LoadHero4[Load Hero Section Billboard]
    LoadHero4 --> DisplayBillboard[✅ Tampilkan Daftar Billboard]
    DisplayBillboard --> End4([Selesai])
    
    TentangKami --> LoadHeroTK[Load Hero Section]
    LoadHeroTK --> LoadTK1[Load Tentang Kami 1]
    LoadTK1 --> LoadTK2b[Load Tentang Kami 2]
    LoadTK2b --> DisplayTK[✅ Tampilkan Tentang Kami<br/>Visi & Misi]
    DisplayTK --> End5([Selesai])
    
    Kontak --> LoadHeroK[Load Hero Section]
    LoadHeroK --> LoadKontak[Load Info Kontak:<br/>- Alamat<br/>- Telepon<br/>- Email<br/>- Maps]
    LoadKontak --> DisplayKontak[✅ Tampilkan Halaman Kontak]
    DisplayKontak --> End6([Selesai])
    
    style Start fill:#4CAF50,stroke:#2E7D32,stroke-width:3px,color:#fff
    style HomePage fill:#81C784,stroke:#388E3C,stroke-width:2px
    style Videotron fill:#64B5F6,stroke:#1976D2,stroke-width:2px
    style Baliho fill:#FFB74D,stroke:#F57C00,stroke-width:2px
    style Billboard fill:#BA68C8,stroke:#7B1FA2,stroke-width:2px
    style TentangKami fill:#4DD0E1,stroke:#0097A7,stroke-width:2px
    style Kontak fill:#FF8A65,stroke:#D84315,stroke-width:2px
```

---

## 4. Flowchart - Admin Management Flow

```mermaid
flowchart TD
    Start([👨‍💼 Admin Akses Panel])
    Start --> LoginPage[🔐 Halaman Login<br/>/admin]
    
    LoginPage --> InputCred[Input Email & Password]
    InputCred --> Validate{Validasi<br/>Kredensial}
    
    Validate -->|❌ Gagal| ErrorMsg[Tampilkan Error]
    ErrorMsg --> LoginPage
    
    Validate -->|✅ Berhasil| Dashboard[📊 Dashboard Admin<br/>Filament]
    
    Dashboard --> ChooseResource{Pilih Resource}
    
    ChooseResource -->|Videotron| VideotronRes[📺 Videotron Resource]
    ChooseResource -->|Baliho| BalihoRes[🪧 Baliho Resource]
    ChooseResource -->|Billboard| BillboardRes[📊 Billboard Resource]
    ChooseResource -->|Hero Section| HeroRes[🖼️ Hero Section Resource]
    ChooseResource -->|Tentang Kami| TKRes[ℹ️ Tentang Kami Resource]
    ChooseResource -->|Kontak| KontakRes[📞 Kontak Resource]
    ChooseResource -->|Users| UserRes[👥 User Management]
    ChooseResource -->|Logout| Logout([👋 Logout])
    
    VideotronRes --> ActionV{Pilih Aksi}
    ActionV -->|Create| CreateV[➕ Buat Videotron Baru]
    ActionV -->|Edit| EditV[✏️ Edit Videotron]
    ActionV -->|Delete| DeleteV[🗑️ Hapus Videotron]
    ActionV -->|View| ViewV[👁️ Lihat Detail]
    
    CreateV --> FormV[Form Input:<br/>- Judul<br/>- Alamat<br/>- Deskripsi<br/>- Ukuran<br/>- Harga<br/>- Rating]
    FormV --> UploadV[Upload Multiple Images]
    UploadV --> SetFeaturedV{Set as Featured?}
    SetFeaturedV -->|Ya| SaveFeaturedV[💾 Simpan dengan<br/>is_featured = true]
    SetFeaturedV -->|Tidak| SaveV[💾 Simpan Data]
    SaveFeaturedV --> SuccessV[✅ Success Message]
    SaveV --> SuccessV
    SuccessV --> Dashboard
    
    EditV --> LoadDataV[Load Data Videotron]
    LoadDataV --> UpdateFormV[Update Form Data]
    UpdateFormV --> UpdateImagesV[Update/Add Images]
    UpdateImagesV --> SaveUpdateV[💾 Update Database]
    SaveUpdateV --> SuccessUpdateV[✅ Updated]
    SuccessUpdateV --> Dashboard
    
    DeleteV --> ConfirmDelete{Konfirmasi<br/>Hapus?}
    ConfirmDelete -->|Ya| DeleteDB[🗑️ Delete from DB<br/>& Delete Images]
    ConfirmDelete -->|Tidak| Dashboard
    DeleteDB --> SuccessDelete[✅ Deleted]
    SuccessDelete --> Dashboard
    
    ViewV --> ShowDetail[Tampilkan Detail:<br/>- Info Lengkap<br/>- Gallery Images<br/>- Bookings Data]
    ShowDetail --> BackToDash[← Kembali]
    BackToDash --> Dashboard
    
    BalihoRes --> SameFlowB[🔄 Same CRUD Flow<br/>as Videotron]
    BillboardRes --> SameFlowBi[🔄 Same CRUD Flow<br/>as Videotron]
    
    SameFlowB --> Dashboard
    SameFlowBi --> Dashboard
    
    HeroRes --> ManageHero[Kelola Hero Section<br/>per Page:<br/>- home<br/>- videotron<br/>- baliho<br/>- billboard<br/>- tentang_kami<br/>- kontak]
    ManageHero --> EditHero[✏️ Edit Title, Subtitle,<br/>Upload Image]
    EditHero --> SaveHero[💾 Save]
    SaveHero --> Dashboard
    
    TKRes --> ManageTK[Kelola 2 Section:<br/>- Tentang Kami 1<br/>- Tentang Kami 2<br/>Visi & Misi]
    ManageTK --> EditTK[✏️ Edit Content]
    EditTK --> SaveTK[💾 Save]
    SaveTK --> Dashboard
    
    KontakRes --> EditKontak[✏️ Edit:<br/>- Alamat<br/>- Telepon<br/>- Email<br/>- Maps Embed]
    EditKontak --> SaveKontak[💾 Save]
    SaveKontak --> Dashboard
    
    UserRes --> ManageUsers[Kelola User:<br/>- Create<br/>- Edit<br/>- Delete<br/>- Roles]
    ManageUsers --> Dashboard
    
    style Start fill:#4CAF50,stroke:#2E7D32,stroke-width:3px,color:#fff
    style Dashboard fill:#2196F3,stroke:#1565C0,stroke-width:3px,color:#fff
    style CreateV fill:#81C784,stroke:#388E3C,stroke-width:2px
    style EditV fill:#FFB74D,stroke:#F57C00,stroke-width:2px
    style DeleteV fill:#E57373,stroke:#C62828,stroke-width:2px
    style SuccessV fill:#66BB6A,stroke:#2E7D32,stroke-width:2px,color:#fff
    style ErrorMsg fill:#EF5350,stroke:#C62828,stroke-width:2px,color:#fff
    style Logout fill:#9E9E9E,stroke:#424242,stroke-width:2px
```

---

## 5. DFD Level 2 - Detail Proses Layanan Videotron

```mermaid
flowchart TB
    subgraph Input
        Pengunjung[👤 Pengunjung<br/>Request /layanan/videotron]
    end
    
    subgraph Process_Layanan_Videotron[" Proses 2.1 - Tampilkan Layanan Videotron "]
        P1[2.1.1<br/>Receive Request]
        P2[2.1.2<br/>Query All Videotrons<br/>from Database]
        P3[2.1.3<br/>Query Hero Section<br/>page_name = 'videotron']
        P4[2.1.4<br/>Prepare Data<br/>Compact Variables]
        P5[2.1.5<br/>Render View<br/>videotronIndex.blade.php]
        P6[2.1.6<br/>Generate HTML<br/>with Images]
        
        P1 --> P2
        P1 --> P3
        P2 --> P4
        P3 --> P4
        P4 --> P5
        P5 --> P6
    end
    
    subgraph DataStores[" Data Stores "]
        D1[(D1: videotrons<br/>Table)]
        D4[(D4: hero_sections<br/>Table)]
        Storage[📁 Storage<br/>Images]
    end
    
    subgraph Output
        Response[📱 Response HTML<br/>Daftar Videotron]
    end
    
    Pengunjung -->|HTTP GET| P1
    
    P2 -.->|SELECT * FROM videotrons| D1
    D1 -.->|Return Collection| P2
    
    P3 -.->|SELECT * WHERE<br/>page_name='videotron'| D4
    D4 -.->|Return Hero Data| P3
    
    P5 -.->|Load Images Path| Storage
    Storage -.->|Return Image URLs| P5
    
    P6 -->|Send Response| Response
    Response -->|Display| Pengunjung
    
    style P1 fill:#E3F2FD,stroke:#1976D2,stroke-width:2px
    style P2 fill:#E8F5E9,stroke:#388E3C,stroke-width:2px
    style P3 fill:#E8F5E9,stroke:#388E3C,stroke-width:2px
    style P4 fill:#FFF3E0,stroke:#F57C00,stroke-width:2px
    style P5 fill:#FCE4EC,stroke:#C2185B,stroke-width:2px
    style P6 fill:#F3E5F5,stroke:#7B1FA2,stroke-width:2px
    style D1 fill:#64B5F6,stroke:#1976D2,stroke-width:2px
    style D4 fill:#64B5F6,stroke:#1976D2,stroke-width:2px
    style Storage fill:#FFB74D,stroke:#F57C00,stroke-width:2px
    style Response fill:#81C784,stroke:#388E3C,stroke-width:2px
```

---

## 6. DFD Level 2 - Detail Proses CRUD Admin (Videotron)

```mermaid
flowchart TB
    subgraph Input
        Admin[👨‍💼 Admin<br/>Authenticated]
    end
    
    subgraph Process_CRUD[" Proses 6.0 - Kelola Videotron (CRUD) "]
        P1[6.1<br/>Create<br/>New Videotron]
        P2[6.2<br/>Read/View<br/>Videotron List]
        P3[6.3<br/>Update<br/>Existing Videotron]
        P4[6.4<br/>Delete<br/>Videotron]
        P5[6.5<br/>Upload<br/>Images]
        P6[6.6<br/>Set Featured<br/>Status]
    end
    
    subgraph Validation[" Validasi "]
        V1{Validate<br/>Form Input}
        V2{Validate<br/>Images<br/>Type & Size}
        V3{Confirm<br/>Delete?}
    end
    
    subgraph DataStores[" Data Stores "]
        D1[(D1: videotrons)]
        Storage[📁 storage/app/public<br/>Images]
    end
    
    Admin -->|Action: Create| P1
    Admin -->|Action: Read| P2
    Admin -->|Action: Update| P3
    Admin -->|Action: Delete| P4
    
    P1 --> V1
    V1 -->|Valid| CreateDB[INSERT INTO<br/>videotrons]
    V1 -->|Invalid| ErrorCreate[❌ Show Error]
    ErrorCreate --> Admin
    CreateDB --> D1
    
    P1 --> P5
    P5 --> V2
    V2 -->|Valid| Upload[Store Images<br/>to Storage]
    V2 -->|Invalid| ErrorUpload[❌ Invalid File]
    ErrorUpload --> Admin
    Upload --> Storage
    Upload --> SavePath[Save paths to<br/>images JSON column]
    SavePath --> D1
    
    P1 --> P6
    P6 --> SetFlag[Update<br/>is_featured flag]
    SetFlag --> D1
    
    P2 -.->|SELECT * FROM| D1
    D1 -.->|Return Data| DisplayList[Display in<br/>Filament Table]
    DisplayList --> Admin
    
    P3 -.->|SELECT WHERE id| D1
    D1 -.->|Return Record| LoadForm[Load Form<br/>with Data]
    LoadForm --> V1
    V1 -->|Valid| UpdateDB[UPDATE videotrons<br/>SET ...]
    UpdateDB --> D1
    
    P3 --> P5
    
    P4 --> V3
    V3 -->|Yes| DeleteImages[Delete Images<br/>from Storage]
    V3 -->|No| Admin
    DeleteImages --> Storage
    DeleteImages --> DeleteDB[DELETE FROM<br/>videotrons<br/>WHERE id]
    DeleteDB --> D1
    
    D1 --> SuccessMsg[✅ Success<br/>Notification]
    SuccessMsg --> Admin
    
    style P1 fill:#81C784,stroke:#388E3C,stroke-width:2px
    style P2 fill:#64B5F6,stroke:#1976D2,stroke-width:2px
    style P3 fill:#FFB74D,stroke:#F57C00,stroke-width:2px
    style P4 fill:#E57373,stroke:#C62828,stroke-width:2px
    style P5 fill:#BA68C8,stroke:#7B1FA2,stroke-width:2px
    style P6 fill:#4DD0E1,stroke:#0097A7,stroke-width:2px
    style V1 fill:#FFF9C4,stroke:#F57F17,stroke-width:2px
    style V2 fill:#FFF9C4,stroke:#F57F17,stroke-width:2px
    style V3 fill:#FFF9C4,stroke:#F57F17,stroke-width:2px
    style D1 fill:#2196F3,stroke:#1565C0,stroke-width:2px,color:#fff
    style Storage fill:#FF9800,stroke:#E65100,stroke-width:2px,color:#fff
    style SuccessMsg fill:#4CAF50,stroke:#2E7D32,stroke-width:2px,color:#fff
```

---

## 7. Entity Relationship Diagram (ERD)

```mermaid
erDiagram
    USERS ||--o{ VIDEOTRONS : manages
    USERS ||--o{ BALIHOS : manages
    USERS ||--o{ BILLBOARDS : manages
    USERS ||--o{ HERO_SECTIONS : manages
    USERS ||--o{ TENTANG_KAMI1S : manages
    USERS ||--o{ TENTANG_KAMI2S : manages
    USERS ||--o{ KONTAKS : manages
    
    USERS {
        bigint id PK
        string name
        string email UK
        string password
        timestamp created_at
        timestamp updated_at
    }
    
    VIDEOTRONS {
        bigint id PK
        string judul
        text alamat
        text deskripsi
        string ukuran
        decimal harga
        decimal rating
        json images
        json bookings
        boolean is_featured
        timestamp created_at
        timestamp updated_at
    }
    
    BALIHOS {
        bigint id PK
        string judul
        text alamat
        text deskripsi
        string ukuran
        decimal harga
        decimal rating
        json images
        json bookings
        boolean is_featured
        timestamp created_at
        timestamp updated_at
    }
    
    BILLBOARDS {
        bigint id PK
        string judul
        text alamat
        text deskripsi
        string ukuran
        decimal harga
        decimal rating
        json images
        json bookings
        boolean is_featured
        timestamp created_at
        timestamp updated_at
    }
    
    HERO_SECTIONS {
        bigint id PK
        string page_name UK
        string title
        string subtitle
        string image_path
        timestamp created_at
        timestamp updated_at
    }
    
    TENTANG_KAMI1S {
        bigint id PK
        string judul
        string subjudul
        text konten
        string foto
        timestamp created_at
        timestamp updated_at
    }
    
    TENTANG_KAMI2S {
        bigint id PK
        string visi
        text deskripsi_visi
        string misi
        text deskripsi_misi
        timestamp created_at
        timestamp updated_at
    }
    
    KONTAKS {
        bigint id PK
        text alamat
        string telepon
        string email
        text maps_embed
        timestamp created_at
        timestamp updated_at
    }
```

---

## 8. Sequence Diagram - Pengunjung Melihat Layanan

```mermaid
sequenceDiagram
    actor Pengunjung
    participant Browser
    participant Laravel as Laravel Router
    participant Controller as Route Closure
    participant Model as Videotron Model
    participant DB as MySQL Database
    participant Storage as File Storage
    participant View as Blade View
    
    Pengunjung->>Browser: Klik Menu "Videotron"
    Browser->>Laravel: GET /layanan/videotron
    Laravel->>Controller: Route Handler
    
    Controller->>Model: Videotron::all()
    Model->>DB: SELECT * FROM videotrons
    DB-->>Model: Return Records
    Model-->>Controller: Collection of Videotrons
    
    Controller->>Model: HeroSection::where('page_name', 'videotron')
    Model->>DB: SELECT * FROM hero_sections
    DB-->>Model: Return Hero Data
    Model-->>Controller: Hero Section Object
    
    Controller->>View: view('layanan.videotron.videotronIndex')
    View->>View: Compile Blade Template
    
    View->>Storage: Load Image URLs
    Storage-->>View: Return Image Paths
    
    View-->>Controller: Compiled HTML
    Controller-->>Laravel: Response Object
    Laravel-->>Browser: HTML Response
    Browser-->>Pengunjung: Display Videotron Page
    
    Note over Pengunjung,View: Total Time: ~200-500ms
```

---

## 9. Sequence Diagram - Admin Create Videotron

```mermaid
sequenceDiagram
    actor Admin
    participant Browser
    participant Filament as Filament Panel
    participant Resource as VideotronResource
    participant Model as Videotron Model
    participant DB as MySQL Database
    participant Storage as File Storage
    
    Admin->>Browser: Login ke /admin
    Browser->>Filament: POST /admin/login
    Filament->>DB: Verify Credentials
    DB-->>Filament: Auth Success
    Filament-->>Browser: Redirect to Dashboard
    
    Admin->>Browser: Klik "Create Videotron"
    Browser->>Filament: GET /admin/videotrons/create
    Filament->>Resource: Load Create Form
    Resource-->>Browser: Display Form
    
    Admin->>Browser: Fill Form & Upload Images
    Admin->>Browser: Submit Form
    Browser->>Filament: POST /admin/videotrons
    
    Filament->>Filament: Validate Input
    
    alt Validation Failed
        Filament-->>Browser: Show Validation Errors
        Browser-->>Admin: Display Errors
    else Validation Success
        Filament->>Storage: Store Images
        Storage-->>Filament: Return Image Paths
        
        Filament->>Model: create([...])
        Model->>DB: INSERT INTO videotrons
        DB-->>Model: Return ID
        Model-->>Filament: Created Instance
        
        Filament-->>Browser: Success Notification
        Browser-->>Admin: Show Success & Redirect to List
    end
    
    Note over Admin,Storage: Images stored in:<br/>storage/app/public/img/videotron/
```

---

## Keterangan Simbol & Warna

### DFD Symbols:
- 🔵 **Oval/Circle**: External Entity (Pengunjung, Admin)
- 🟢 **Rectangle**: Process (1.0, 2.0, dll)
- 🔷 **Cylinder**: Data Store (Database Tables)
- 📁 **Folder**: File Storage
- →: Data Flow

### Color Coding:
- 🟢 **Hijau**: Frontend Processes
- 🟠 **Oranye**: Backend/Admin Processes
- 🔵 **Biru**: Data Stores/Database
- 🟣 **Ungu**: External Entities
- 🟡 **Kuning**: Validation/Decision Points
- 🔴 **Merah**: Delete Operations

---

## Teknologi Stack

- **Framework**: Laravel 11.x
- **Admin Panel**: Filament 3.x
- **Database**: MySQL
- **Frontend**: Blade Templates + Tailwind CSS
- **File Storage**: Laravel Storage (Symbolic Link)
- **Authentication**: Laravel Breeze/Filament Auth

---

## Notes
- Semua diagram menggunakan **Mermaid** syntax
- Bisa di-render langsung di VS Code dengan Mermaid extension
- Atau di GitHub/GitLab markdown files
- Untuk export ke PNG/SVG, gunakan Mermaid CLI atau online editor

