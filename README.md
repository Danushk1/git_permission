```mermaid
 erDiagram
    POST ||--o{ POST_CATEGORIES : post_cat
    POST }|--|{ CATEGORIES : typs
    POST }|--o{ POST_META : post_cat
    POST }|--o{ POST_COMMENTS : post_cat
     POST }|--o{ TAGS : post_cat
      POST ||--o{ POST_TAGS : post_cat
    POST {
        unsigned id
        int author_id
        int parent_id
        string title
        string meta_title
        string slug
         string summery
          int published
        string content
    }
  
   POST_CATEGORIES {
       unsigned id
        int post_id
        int category_id
      
    }
    CATEGORIES ||--o{ POST_CATEGORIES : post_cat
   CATEGORIES {
       unsigned id
        int parent_id
        string title
        string meta_title
        string slug
         string content
    }
    POST_META {
         unsigned id
        int post_id
        string content
       
    }
   POST_COMMENTS {
        unsigned id
        int post_id
         int parent_id
        string title
        int published
        string published
        
    }
     TAGS ||--o{ POST_TAGS : post_cat
   TAGS {
         unsigned id
        string title
        string meta_title
        string slug
         string content
    }
   POST_TAGS{
         unsigned id
        int post_id
          int tag_id
    }

      
```

