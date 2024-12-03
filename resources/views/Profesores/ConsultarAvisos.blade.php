extends('layouts.MoldeTeachers')

@section('title', 'Avisos')

@section('content')
<div class="container my-4">
        <h1 class="h3 mb-4">Notificaciones</h1>
        <div id="notifications-container">
            <!-- Las notificaciones aparecerán aquí dinámicamente -->
        </div>
    </div>

    <script>
        const notifications = [
            {
                id: 1,
                admin_id: 101,
                user_id: 202,
                message: "Tu clase ha sido programada para el lunes a las 10:00 AM.",
                created_at: "2024-11-26 14:30:00"
            },
            {
                id: 2,
                admin_id: 101,
                user_id: 202,
                message: "El pago de tu membresía vence en 3 días.",
                created_at: "2024-11-25 10:00:00"
            },
            {
                id: 3,
                admin_id: 102,
                user_id: 203,
                message: "Recuerda completar tu evaluación mensual.",
                created_at: "2024-11-24 08:15:00"
            }
        ];

        // Función para renderizar notificaciones
        function renderNotifications(data) {
            const container = document.getElementById('notifications-container');
            container.innerHTML = ''; // Limpiar contenido previo

            data.forEach(notification => {
                const notificationElement = document.createElement('div');
                notificationElement.className = 'notification';
                notificationElement.innerHTML = `
                    <p>${notification.message}</p>
                    <p class="time">${new Date(notification.created_at).toLocaleString()}</p>
                `;
                container.appendChild(notificationElement);
            });
        }

        // Cargar notificaciones al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            renderNotifications(notifications);
        });
    </script>
@endsection