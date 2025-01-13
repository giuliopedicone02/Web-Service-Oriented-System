package wiz.hogwartsos.sortinghack.models;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Entity
@Table(name="langhouses")
public class langhouse {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id=0L;
    private String name;
    private String motto;
    
    public langhouse(long id, String name, String motto) {
        this.id = id;
        this.name = name;
        this.motto = motto;
    }

    public langhouse() {
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getMotto() {
        return motto;
    }

    public void setMotto(String motto) {
        this.motto = motto;
    }

    
    
}
