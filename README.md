classDiagram\n
    class Creature {
        +int id
        +string name
        +string image_url
        +string description
        +save()
        +update()
        +delete()
        +get_details()
    }

  class CreatureDAO {
        +get_all_creatures()
        +get_creature_by_id(id: int)
        +create_creature(creature: Creature)
        +update_creature(creature: Creature)
        +delete_creature(id: int)
    }

 class CreatureController {
        +create_creature(data: list)
        +edit_creature(id: int, data: list)
        +delete_creature(id: int)
        +view_creature_details(id: int)
    }

   class CreatureView {
        +display_creature_list(creatures: List<Creature>)
        +display_create_form()
        +display_edit_form(creature: Creature)
        +display_creature_details(creature: Creature)
    }
    class AuthService {
        +login(username: string, password: string)
        +is_authenticated()
    }
    CreatureController --> CreatureDAO : Llama para crear o pedir datos sobre las criaturas
    CreatureController --> CreatureView : Llama para mostrar los formularios de creacion y edicion de las criaturas
    CreatureView --> CreatureController : Manda la accion que realiza el usuario
    CreatureRepository --> Creature : Crea, elimina, modifica criaturas
    AuthService --> CreatureController : Controla el acceso

He intentado hacer un diagrama de clases en el README como has puesto en el ejercicio. El proyecto no está completado porque no doy a basto con los examenes que hemos tenido estas dos semanas ademas de los proyectos
