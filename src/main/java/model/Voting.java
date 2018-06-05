package model;

import javax.persistence.*;
import java.util.ArrayList;

/**
 * Represents a voting as it is in the database
 *
 * @author Daniel Modliba
 * @version 2018-06-05
 */
@Entity
public class Voting {

    @Id
    @GeneratedValue(strategy = GenerationType.SEQUENCE)
    private long id;

    @ManyToOne
    private User creator;

    @ManyToMany
    private ArrayList<User> members;

    @OneToMany
    private ArrayList<Voteable> voteables;

    private String title;
    private String description;

    public Voting(User creator, ArrayList<User> members, ArrayList<Voteable> voteables, String title, String description) {
        this.creator = creator;
        this.members = members;
        this.voteables = voteables;
        this.title = title;
        this.description = description;
    }

    public long getId() {
        return id;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public User getCreator() {
        return creator;
    }

    public void setCreator(User creator) {
        this.creator = creator;
    }

    public ArrayList<User> getMembers() {
        return members;
    }

    public void setMembers(ArrayList<User> members) {
        this.members = members;
    }

    public ArrayList<Voteable> getVoteables() {
        return voteables;
    }

    public void setVoteables(ArrayList<Voteable> voteables) {
        this.voteables = voteables;
    }
}
