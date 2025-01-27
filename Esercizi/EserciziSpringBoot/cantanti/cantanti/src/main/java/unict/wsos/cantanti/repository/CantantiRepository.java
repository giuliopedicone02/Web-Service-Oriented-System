package unict.wsos.cantanti.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import unict.wsos.cantanti.model.Cantanti;
import unict.wsos.cantanti.model.Genere;

public interface CantantiRepository extends JpaRepository<Cantanti, Long> {
    List<Cantanti> findByGenereId(Genere genereId);
}
