package model;

import javax.persistence.*;
import java.util.ArrayList;

/**
 * Represents the comment type from the database
 *
 * @author Daniel Modliba
 * @version 2018-06-05
 */
@Entity
public class Voteable {

    @Id
    @GeneratedValue(strategy = GenerationType.SEQUENCE)
    private long id;

    @ManyToMany
    private ArrayList<User> voters;

    private String title;

    public Voteable(ArrayList<User> voters, String title) {
        this.voters = voters;
        this.title = title;
    }

    public long getId() {
        return id;
    }

    public ArrayList<User> getVoters() {
        return voters;
    }

    public void setVoters(ArrayList<User> voters) {
        this.voters = voters;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }
}
