package wiz.hogwartsos.sortinghack.models;


import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;
import jakarta.persistence.Table;

@Entity
@Table(name = "wizardevs")
public class wizardev {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id=0L;
    private String name;
    private int year=1;
    @ManyToOne
    @JoinColumn(name = "langhouse_id")
    private langhouse langhouseId;
    public wizardev() {
    }
    public wizardev(long id, String name, int year, langhouse langhouse_id) {
        this.id = id;
        this.name = name;
        this.year = year;
        this.langhouseId = langhouseId;
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
    public int getYear() {
        return year;
    }
    public void setYear(int year) {
        this.year = year;
    }
    public langhouse getLanghouseId() {
        return langhouseId;
    }
    public void setLanghouseId(langhouse langhouseId) {
        this.langhouseId = langhouseId;
    }

    
    
}
