package wiz.hogwartsos.sortinghack.repositories;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import wiz.hogwartsos.sortinghack.models.langhouse;
import wiz.hogwartsos.sortinghack.models.wizardev;

public interface wizardevRepository extends JpaRepository<wizardev,Long>
{

    List<wizardev> findByLanghouseId(langhouse id);

    List<wizardev> findByNameContainingIgnoreCase(String name);
}
